<?php
namespace Dudo1985\WPDocGen;

/**
 * @author Dario Curvino <@dudo>
 * @since  1.0.0
 */

if (!class_exists('Dudo1985\WPDocGen\WPDocGen')) {

    class WPDocGen {

        /**
         * String with script usage
         */
        public const USAGE_MESSAGE =
            'Usage: php wp-doc-gen.php <src> <file_name.md> [-e <excluded_folder>] [-p <prefix>]';

        /**
         * The file name (with path, eventually) to create
         *
         * @var string
         */
        public string $file_name;

        /**
         * The folders to exclude
         *
         * @var bool|string
         */
        public bool|string $excluded_folders = false;

        /**
         * By default, search for hooks
         *
         * @var string
         */
        public string $function_to_seek = 'apply_filters|do_action';

        /**
         * True if shortcodes must be searched
         *
         * @var bool
         */
        public bool $seek_shortcode = false;
        /**
         * The prefix to look for
         *
         * @var string
         */
        public string $prefixes = '';

        /**
         * The number of the hooks found
         *
         * @var int
         */
        public int  $hook_count = 0;

        /**
         * The number of file processed
         *
         * @var int
         */
        public int  $files_count_php = 0;

        /**
         * by default, verbose is false
         *
         * @var bool
         */
        public bool $verbose = false;

        /**
         * Parser instance
         *
         * @var CommentParser
         */
        private CommentParser $parser;

        /**
         * Printer instance
         *
         * @var Printer
         */
        private Printer $printer;

        /**
         * Init the class
         *
         * @return void
         * @since 1.0.0
         * @author Dario Curvino <@dudo>
         *
         */
        public function init(): void {

            $this->parser  = new CommentParser();
            $this->printer = new Printer();

            global $argv;

            //first, check if string has params that no needs input
            $this->paramsNoInput($argv);

            $folder_path     = $argv[1];
            $this->file_name = $argv[2];

            //print an error and exit(1) if input folder doesn't exist
            $this->inputFolderExists($folder_path);

            //create file if it doesn't exist, print error if file can't be created or is not writable
            $this->checkOutputFile();

            //check input params
            $this->checkParams($argv);

            $this->printer->messageWithBackground('Starting Folder exploration: ', $folder_path);

            $start_time = microtime(true);

            // Use the explore_folder function to explore the folder and write the documentation
            $this->exploreFolder($folder_path, true);

            //additional info if verbose is enabled
            $this->printInfo($start_time);
        }

        /**
         * Check if the folder to iterate exists
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $folder_path
         *
         * @return void
         */
        function inputFolderExists($folder_path): void {
            if (!is_dir($folder_path)) {
                $this->printer->error('the input folder does not exist.');
                exit(1);
            }
        }

        /**
         * Checks if the output file exists and is writable. If the file doesn't exist,
         * it will be created.
         *
         * @return void
         * @since  2.0.0
         * @author Dario Curvino <@dudo>
         */
        function checkOutputFile(): void {
            // If the output file doesn't exist, create it
            if (!file_exists($this->file_name)) {
                $file_created = touch($this->file_name);

                if($file_created === false) {
                    $this->printer->error('could not create the output file');
                    exit(1);
                }
            }

            if (!is_writable($this->file_name)) {
                $this->printer->error('the specified output file is not writable');
                exit(1);
            }
        }

        /**
         * Check if string was called with params that doesn't need inputs:
         * -no params at all (will display a help message)
         * -h or --help
         * -V or --version
         *
         * @author Dario Curvino <@dudo>
         *
         * @since 2.0.3
         *
         * @param $argv
         *
         * @return void
         */
        function paramsNoInput($argv):void {
            //print help message if -h or --help is used
            $this->helpMessage($argv);

            //print version if -V or --version is used
            $this->printVersion($argv);
        }

        /**
         * Manage params
         *
         * @param $argv
         * @return void
         * @author Dario Curvino <@dudo>
         *
         * @since 2.0.0
         */
        function checkParams($argv): void{
            //check if the script is called with -v or --verbose
            $this->verbose          = $this->verboseOutput($argv);

            //check if --shortcode or -s was used
            $this->parseShortcode($argv);

            //check if the script is called with --exclude, or -e
            $this->excluded_folders = $this->getOptions($argv, '--exclude', '-e');

            //check if script is called with --prefix -p param
            $this->prefixes         = (string)$this->getOptions($argv, '--prefix', '-p');
        }

        /**
         * Return help message if no params, -h or --help are used
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $argv
         *
         * @return void
         */
        function helpMessage($argv): void {
            //Check if in argv exists '--help' or '-help'
            //also, if WPDocGen is run without params, print the help message
            if (!in_array('--help', $argv) && !in_array('-h', $argv) && isset($argv[1])) {
                return;
            }

            $this->printer->newline();
            $this->printer->messageGreen('Usage');
            $this->printer->message(self::USAGE_MESSAGE);
            $this->printer->newline();
            $this->printer->messageGreen('Options');
            $this->printer->helpOption('-h, --help', 'Display this help message');
            $this->printer->helpOption('-V, --version','Display this application version');
            $this->printer->helpOption('-s, --shortcode','Search for add_shortcode instead of hooks');
            $this->printer->helpOption('-e, --exclude','Exclude the specified folders, comma separated');
            $this->printer->helpOption('-p, --prefix', 'Only parse hooks starting with the specified prefix.');
            $this->printer->newline();
            $this->printer->messageGreen('Examples');
            $this->printer->helpExamples('To scan all the files in the current directory,
            and save the result into the file hooks.md', 'wp-doc-gen . hooks.md');
            $this->printer->newline();
            $this->printer->helpExamples('To scan all the files in the current directory,
            excluding the dirs vendor and node_modules, and catch only hooks with prefixes \'prefix1_ prefix2_\'',
                'wp-doc-gen . hooks.md --exclude vendor node_modules --prefix prefix1_ prefix2_');

            exit(0);
        }

        /**
         * print Version if -v or --version is used
         *
         * @author Dario Curvino <@dudo>
         *
         * @since 2.0.0
         *
         * @param $argv
         *
         * @return void
         */
        function printVersion($argv): void {
            if (in_array('--version', $argv) || in_array('-V', $argv)) {
                $this->printer->message(WPDocGenVersion);
                exit(0);
            }
        }

        /**
         * @param  $argv
         * @return bool
         * @author Dario Curvino <@dudo>
         *
         * @since
         */
        function verboseOutput($argv): bool {
            if (in_array('--verbose', $argv) || in_array('-v', $argv)) {
                return true;
            }
            return false;
        }

        /**
         * change $this->function_to_seek is --shortcode is enabled
         *
         * @param $argv
         * @return void
         * @author Dario Curvino <@dudo>
         *
         * @since 2.0.0
         */
        function parseShortcode ($argv): void {
            if (in_array('--shortcode', $argv) || in_array('-s', $argv)) {
                $this->function_to_seek = 'add_shortcode';
                $this->seek_shortcode   = true;
            }
        }

        /**
         * Check if script is executed with passed params, and return the option
         *
         * @param $argv
         * @param $needle1
         * @param $needle2
         * @return false|string
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         */
        function getOptions($argv, $needle1, $needle2): bool|string {
            if (!in_array($needle1, $argv) && !in_array($needle2, $argv)) {
                return false;
            }

            $argv_key_index = $this->returnArrayKeyIndex($argv, $needle1, $needle2);
            if ($argv_key_index === false) {
                return false;
            }

            $option = false;

            if (isset($argv[$argv_key_index + 1])) {
                $exclude_args = array_slice($argv, $argv_key_index + 1);
                foreach ($exclude_args as $arg) {
                    if (str_starts_with($arg, '-')) {
                        break;
                    }

                    //add support for comma separated string
                    //if a ',' is found at the end of the string, remove it
                    $arg = rtrim($arg, ',');

                    if ($option === false) {
                        $option = $arg;
                    } else {
                        $option .= ', ' . $arg;
                    }
                }
            }

            if ($option !== false && ($needle1 === '-e' || $needle2 === 'exclude')) {
                $this->printer->messageWithBackground('Excluding folders: ', $option);
            }

            return $option;
        }

        /**
         * Search for the first occurrence of either $key1 or $key2 in the given $argv array.
         *
         * @param array $argv  An array of arguments to search through.
         * @param string $key1 The first key to search for in the $argv array.
         * @param string $key2 The second key to search for in the $argv array if $key1 is not found.
         *
         * @return int|bool Returns the index of the key if found, or false if neither key is found.
         *
         * @author Dario Curvino <@dudo>
         *
         * @since 2.0.0
         */
        function returnArrayKeyIndex(array $argv, string $key1, string $key2): bool|int {
            //search the first key into $argv
            $key_index = array_search($key1, $argv);

            //if not found, try to search the second key
            if ($key_index === false) {
                $key_index = array_search($key2, $argv);
            }

            //if found and is int, return
            if (is_int($key_index)) {
                return $key_index;
            }

            return false;
        }

        /**
         * Explore the folder for php files
         *
         * @param      $folder_path
         * @param bool $rewrite_file
         *
         * @return void
         * @since  1.0.0
         *
         * @author Dario Curvino <@dudo>
         */
        function exploreFolder($folder_path, bool $rewrite_file = false): void {
            if ($rewrite_file === true) {
                unlink($this->file_name);
            }

            // Open the output file in write mode
            $file_open = fopen($this->file_name, 'a');

            // Create an array of excluded folders
            $excluded_folders = [];
            if ($this->excluded_folders !== false) {
                $excluded_folders = explode(', ', $this->excluded_folders);
            }

            // Iterate through all the files in the folder
            $files = scandir($folder_path);

            $this->loopFolder($files, $excluded_folders, $folder_path, $file_open);

            // Close the output file
            fclose($file_open);
        }

        /**
         * Loop the folder
         *
         * @param $files
         * @param $excluded_folders
         * @param $folder_path
         * @param $file_open
         * @return void
         * @since 2.0.0
         * @author Dario Curvino <@dudo>
         *
         */
        function loopFolder($files, $excluded_folders, $folder_path, $file_open): void {
            foreach ($files as $file) {
                //Ignore hidden folders or files
                if (str_starts_with($file, '.')) {
                    continue;
                }

                //ignore this dir (.) previous dir (..) and the user defined folder to exclude
                if ($file === '.' || $file === '..' || in_array($file, $excluded_folders)) {
                    continue;
                }

                $file_path = $folder_path . '/' . $file;

                // If the file is a folder, call again exploreFolder
                if (is_dir($file_path)) {
                    if($this->verbose === true) {
                        $this->printer->messageWithBackground('Exploring folder ', $file_path);
                    }
                    $this->exploreFolder($file_path);
                }
                else {
                    //here means that is a php file, so analyze it and eventually write the doc
                    $this->analyzePhpFile($file_path, $file_open);
                }
            }
        }

        /**
         * Look for apply_filter and do_action in a file
         * If prefix is not provided, return them all
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param        $file_path
         * @param        $file_open
         *
         * @return void
         */
        function analyzePhpFile($file_path, $file_open): void {
            $extension = pathinfo($file_path, PATHINFO_EXTENSION);
            if ($extension !== 'php') {
                return;
            }

            // Open the file in read mode
            $file_content = file_get_contents($file_path);

            $prefixes = explode(', ', $this->prefixes);

            foreach ($prefixes as $prefix) {
                // Find occurrences of the apply_filters and do_action functions
                $matches = [];
                $num_matches = preg_match_all(
                    '/\b(' .$this->function_to_seek. ')\b\s*\(\s*[\'"](' . $prefix . '[^\'"]+)[\'"]/', $file_content,
                    $matches, PREG_OFFSET_CAPTURE
                );
                if ($num_matches > 0) {
                    $this->writeFile($file_open, $file_path, $matches, $file_content);
                }
            }

            $this->files_count_php++;
        }

        /**
         * Write the file
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $file_open
         * @param $file_path
         * @param $matches
         * @param $file_content
         *
         * @return void
         */
        function writeFile($file_open, $file_path, $matches, $file_content): void {
            // Write information about the functions to the output file
            foreach ($matches[0] as $index => $match) {
                $hook_type    = $matches[1][$index][0];
                $hook_name    = $matches[2][$index][0];
                $match_offset = $matches[0][$index][1];
                //get the line number
                $line_number = substr_count(substr($file_content, 0, $match_offset), "\n") + 1;
                $link        = "Source: [$file_path, line $line_number]($file_path:$line_number)";

                //get the comment
                $comment = $this->parser->getDocCommentByLine($file_path, $line_number);

                //write the hook and the link to file and line
                //e.g. do_action('yasr_add_admin_scripts_begin')
                //Source: ../yet-another-stars-rating/admin/classes/YasrAdmin.php, line 155
                if($this->seek_shortcode === true) {
                    fwrite($file_open, "\n ### Shortcode $hook_name \n\n $link\n");
                } else {
                    fwrite($file_open, "\n ### `$hook_type('$hook_name')` \n\n $link\n");
                }

                //write the comment if exists
                $this->writeComment($comment, $file_open);

                fwrite($file_open, '___');

                $this->hook_count++;
            }
            fwrite($file_open, "\n");
        }

        /**
         * @param $comment
         * @param $file_open
         *
         * @return void
         * @since  1.0.0
         *
         * @author Dario Curvino <@dudo>
         */
        function writeComment($comment, $file_open): void {
            if (!empty($comment)) {
                if (isset($comment['description']) && $comment['description'] !== '') {
                    $description = $comment['description'];
                    fwrite($file_open, "\n");
                    fwrite($file_open, $description . "\n\n");
                }

                //do not write table of args for add_shortcode
                if($this->seek_shortcode !== true) {
                    if (isset($comment['args']) && $comment['args'] !== '') {
                        $args = $comment['args'];
                        $this->writeTable($file_open, $args);
                    }
                }
            }
        }

        /**
         * @param $file_open
         * @param $args array Here $args must begin with an argument, then type and description
         *
         * @return void
         * @since  1.0.0
         *
         * @author Dario Curvino <@dudo>
         */
        function writeTable($file_open, array $args): void {
            $t = new MarkdownTable();
            $headers = ['Argument', 'Type', 'Description'];

            foreach ($args as $arg) {
                //remove multiple consecutive whitespaces
                $arg = WPDocGen::removeMultipleWhitespaces($arg);

                $argument_type = $this->parser->findType($arg);
                $argument_name = $this->parser->findArgument($arg);
                $argument_desc = $this->parser->findArgumentDescription($arg, $argument_name, $argument_type);

                $t->addRow([$argument_name, $argument_type, $argument_desc]);
            }

            $t->addHeader($headers);

            fwrite($file_open, $t->getTable());
        }

        /**
         * Print additional info if verbose is enabled
         *
         * @param $start_time
         * @return void
         * @author Dario Curvino <@dudo>
         *
         * @since
         */
        public function printInfo($start_time): void {
            $this->printer->message('Finished folder exploration'. "\n");

            if($this->verbose === true) {
                $processed_php_file_text = ANSI_GREEN. $this->files_count_php .ANSI_RESET. ' php files have been processed';

                $end_time   = microtime(true);
                $total_time = $end_time - $start_time;

                $this->printer->message($processed_php_file_text);
                $this->printer->message('Execution time:  ' . $total_time . ' seconds');
            }

            if($this->seek_shortcode === true) {
                $type = ' shortcodes';
            } else {
                $type = ' hooks';
            }

            $this->printer->message(ANSI_GREEN. $this->hook_count .ANSI_RESET. $type . ' has been found');
            $this->printer->message('File ' . $this->printer->returnStringWithBackground($this->file_name) .
                ' saved successfully.');
        }

        /**
         * Remove multiple whitespaces from a string
         *
         * @param $string
         *
         * @return string
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         */
        static function removeMultipleWhitespaces($string): string{
            return preg_replace('/\s+/', ' ', $string);
        }

    }

}
