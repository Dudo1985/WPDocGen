<?php
namespace Dudo1985\WPDocGen;

use SplFileObject;

/**
 * @author Dario Curvino <@dudo>
 * @since  1.0.0
 */

if (!class_exists('Dudo1985\WPDocGen\WPDocGen')) {

    class WPDocGen {

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
         * The prefix to look for
         *
         * @var string
         */
        public string $prefix = '';

        /**
         * The number of the hooks found
         *
         * @var int
         */
        public int $count = 0;

        /**
         * Init the class
         *
         * @return void
         * @since 1.0.0
         * @author Dario Curvino <@dudo>
         *
         */
        public function init(): void {
            global $argc;
            global $argv;

            if ($argc < 3 || $argc > 7) {
                echo "Usage: php wp-doc-gen.php <folder_path> <file_name> [-e <excluded_folder>] [-p <prefix>]\n";
                exit(1);
            }

            $folder_path     = $argv[1];
            $this->file_name = $argv[2];

            $this->inputFolderExists($folder_path);

            // If the output file doesn't exist, create it
            if (!file_exists($this->file_name)) {
                touch($this->file_name);
            }

            if (!is_writable($this->file_name)) {
                echo "Error: the specified output file is not writable.\n";
                exit(1);
            }

            $this->checkParams($argv);

            // Use the explore_folder function to explore the folder and write the documentation
            echo "Starting folder exploration: $folder_path\n";
            $this->exploreFolder($folder_path, true);
            echo "Finished folder exploration.\n";
            echo "$this->count hooks has been found\n";
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
                echo "Error: the specified folder does not exist.\n";
                exit(1);
            }
        }

        /**
         * Manage params
         *
         * @param $argv
         * @return void
         * @author Dario Curvino <@dudo>
         *
         * @since 1.0.2
         */
        function checkParams($argv): void{
            //check if the script is called with -e param
            $this->excluded_folders = $this->getExcludeFolders($argv);

            //check if script is called with -p param
            $this->prefix           = $this->getPrefix($argv);
        }


        /**
         * Check if script is executed with -e, and, if so, return a string of excluded dirs comma separated
         * e.g. vendor,node_modules
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $argv
         *
         * @return false|string
         */
        function getExcludeFolders($argv): bool|string {
            $exclude_folder = false;
            $exclude_keys = ['-e', '--exclude'];
            foreach ($exclude_keys as $exclude_key) {
                if (in_array($exclude_key, $argv, true)) {
                    $exclude_key_index = array_search($exclude_key, $argv, true);
                    if (isset($argv[$exclude_key_index + 1])) {
                        $exclude_args = array_slice($argv, $exclude_key_index + 1);
                        foreach ($exclude_args as $arg) {
                            if (str_starts_with($arg, '-')) {
                                break;
                            }
                            if ($exclude_folder === false) {
                                $exclude_folder = $arg;
                            } else {
                                $exclude_folder .= ',' . $arg;
                            }
                        }
                    }
                }
            }

            if ($exclude_folder !== false) {
                echo "Excluding folders: $exclude_folder\n";
            }

            return $exclude_folder;
        }

        /**
         * Return prefix if param -p or --prefix is used
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $argv
         *
         * @return string
         */
        function getPrefix($argv): string {
            $prefix = '';
            $prefix_keys = ['-p', '--prefix'];
            foreach ($prefix_keys as $prefix_key) {
                if (in_array($prefix_key, $argv, true)) {
                    $prefix_key_index = array_search($prefix_key, $argv, true);
                    if (isset($argv[$prefix_key_index + 1])) {
                        $exclude_args = array_slice($argv, $prefix_key_index + 1);
                        foreach ($exclude_args as $arg) {
                            if (str_starts_with($arg, '-')) {
                                break;
                            }
                            if ($prefix === '') {
                                $prefix = $arg;
                            }
                        }
                    }
                }
            }
            return $prefix;
        }

        /**
         * Explore the folder for php files
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param             $folder_path
         * @param bool|string $exclude_folder
         * @param bool        $rewrite_file
         *
         * @return void
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
                $excluded_folders = explode(',', $this->excluded_folders);
            }

            // Iterate through all the files in the folder
            $files = scandir($folder_path);
            foreach ($files as $file) {
                // Ignore hidden folders
                if (str_starts_with($file, '.')) {
                    continue;
                }

                if ($file === '.' || $file === '..' || in_array($file, $excluded_folders)) {
                    continue;
                }
                $file_path = $folder_path . '/' . $file;

                // If the file is a folder, recursively explore the folder
                if (is_dir($file_path)) {
                    //echo "Exploring folder: $file_path\n";
                    $this->exploreFolder($file_path);
                }
                else {
                    //here means that is a php file, so analyze for it and eventually write the doc
                    $this->analyzePhpFile($file_path, $file_open);
                }
            }

            // Close the output file
            fclose($file_open);
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
            if ($extension === 'php') {
                // Open the file in read mode
                $file_content = file_get_contents($file_path);

                // Find occurrences of the apply_filters and do_action functions
                $matches     = [];
                $num_matches = preg_match_all(
                    '/\b(apply_filters|do_action)\b\s*\(\s*[\'"](' . $this->prefix . '[^\'"]+)[\'"]/', $file_content,
                    $matches, PREG_OFFSET_CAPTURE
                );
                if ($num_matches > 0) {
                    $this->writeFile($file_open, $file_path, $matches, $file_content);
                }
            }
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
                $comment = $this->getDocCommentByLine($file_path, $line_number);

                //write the hook and the link to file and line
                //e.g. do_action('yasr_add_admin_scripts_begin')
                //Source: ../yet-another-stars-rating/admin/classes/YasrAdmin.php, line 155
                fwrite($file_open, "\n ### `$hook_type('$hook_name')` \n\n $link\n");

                //write the comment if exists
                $this->writeComment($comment, $file_open);

                fwrite($file_open, '___');

                $this->count++;
            }
            fwrite($file_open, "\n");
        }

        /**
         * Given a file path and a line number, returns the documentation comment
         * preceding the line as a string.
         *
         * @param string $filePath   The path of the file to analyze.
         * @param int    $lineNumber The line number to analyze.
         *
         * @return array The documentation comment preceding the line as an array.
         */
        function getDocCommentByLine(string $filePath, int $lineNumber): array {
            $comment = []; //avoid undefined
            $file    = new SplFileObject($filePath);
            $file->seek($lineNumber - 2); // positions on the previous line

            // Analyzes the previous lines to find the documentation comment
            $line = trim($file->current());

            //if the previous line is the end of the comment, get the text until /** (the begin of the comment) is reached
            if ($line === '*/') {
                // If the previous line is the end of the comment, search for the beginning of the comment (/**) by moving backwards
                while ($file->valid()) {
                    $file->seek($file->key() - 1);
                    $line = trim($file->current());

                    if ($line === '/**') {
                        break;
                    }
                }
            }

            // If line is the beginning of the comment, start reading the comment
            if ($line === '/**') {
                $comment = $this->loopComment($file);
            }

            return $comment;
        }

        /**
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $file | SplFileObject object
         *
         * @return array
         */
        function loopComment($file): array {
            $comment = [];
            //in markdown, this is for italics
            $comment['description'] = '*';

            while ($file->valid()) {
                $comment_line = trim($file->current());

                // If we reach the end of the comment, stop
                if ($comment_line === '/**' || $comment_line === '*') {
                    $file->next();
                    continue;
                }

                //if this is the end of the comment, exit from cycle
                if ($comment_line === '*/') {
                    break;
                }

                //remove all the * at the beginning of the string, if exists
                if (str_starts_with($comment_line, '*')) {
                    $comment_line = trim(substr($comment_line, 1));
                }

                if (!$this->isTag($comment_line)) {
                    //if the comment is still empty, add just the text
                    if ($comment['description'] === '*') {
                        $comment['description'] .= $comment_line . '*';
                    }
                    else {
                        //append to comment with new lines
                        $comment['description'] .= "\n\n*" . $comment_line . '*';
                    }
                }
                else {
                    $comment_line_no_tag = $this->removeTagFromString($comment_line);
                    $comment['args'][]   = $comment_line_no_tag;
                }
                //go to next line
                $file->next();
            }
            return $comment;
        }

        /**
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $comment
         * @param $file_open
         *
         * @return void
         */
        function writeComment($comment, $file_open): void {
            if (!empty($comment)) {
                if (isset($comment['description']) && $comment['description'] !== '') {
                    $description = $comment['description'];
                    fwrite($file_open, "\n");
                    fwrite($file_open, "$description" . "\n\n");
                }

                if (isset($comment['args']) && $comment['args'] !== '') {
                    $args = $comment['args'];

                    $this->writeTable($file_open, $args);
                }
            }
        }

        /**
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $file_open
         * @param $args array Here $args must begin with an argument, then type and description
         *
         * @return void
         */
        function writeTable($file_open, array $args): void {
            $t       = new MarkdownTable();
            $headers = ['Argument', 'Type', 'Description'];

            foreach ($args as $arg) {
                //remove multiple consecutive whitespaces
                $arg = $this->removeMultipleWhitespaces($arg);

                $argument_type = $this->findType($arg);
                $argument_name = $this->findArgument($arg);
                $argument_desc = $this->findArgumentDescription($arg, $argument_name);

                $t->addRow([$argument_name, $argument_type, $argument_desc]);
            }

            $t->addHeader($headers);

            fwrite($file_open, $t->getTable());
        }

        /**
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param string $string
         *
         * @return string|void
         */
        function removeTagFromString(string $string) {
            $first_word = $this->findFirstWord($string);

            if ($this->isTag($first_word)) {
                return trim(str_replace($first_word, '', $string));
            }
        }

        /**
         * In a doc block the type come after the tag and before the argument.
         * When this method is called, the tag has been removed.
         * So, if there is a word, must be the type
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param string $string the string where to search the type
         *
         * @return string
         */
        function findType(string $string): string {
            $first_word = $this->findFirstWord($string);

            if (!$this->isTag($first_word) && !$this->isArgument($first_word)) {
                return $first_word;
            }

            return '';
        }

        /**
         * Find the name of the first variable inside a string
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $string
         *
         * @return string
         */
        function findArgument($string): string {
            $argument = '';

            $pattern = '/\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/';

            if (preg_match($pattern, $string, $matches)) {
                $argument = $matches[0];
            }

            return $argument;
        }

        /**
         * In a doc block the description come after whe argument
         * So, this method remove all the text before the argument (included)
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $string
         * @param $argument
         *
         * @return string
         */
        function findArgumentDescription($string, $argument): string {
            $description = '';

            if ($string && $argument) {
                //find the position of the argument inside the string
                $argument_index = strpos($string, $argument);

                //get the text before the argument
                $text_before_desc = $argument_index + strlen($argument);

                //get the description
                $description = substr($string, $text_before_desc);
            }

            return $description;
        }

        /**
         * Return the first word of a string
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $string
         *
         * @return false|string
         */
        public function findFirstWord($string): bool|string {
            return strtok($string, ' '); // First word of the string
        }

        /**
         * Check if the provided word is a tag
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $word
         *
         * @return bool
         */
        public function isTag($word): bool {
            if (str_starts_with($word, '@')) {
                return true;
            }
            return false;
        }

        /**
         * Check if the provided word is an argument
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $word
         *
         * @return bool
         */
        public function isArgument($word): bool {
            if (str_starts_with($word, '$')) {
                return true;
            }
            return false;
        }


        /**
         * Remove multiple whitespaces from a string
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param $string
         *
         * @return string
         */
        function removeMultipleWhitespaces($string): string {
            return preg_replace('/\s+/', ' ', $string);
        }

    }

}
