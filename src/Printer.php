<?php
/**
 * Helper class to print into the terminal
 *
 * @since 2.0.0
 * @author Dario Curvino <@dudo>
 */

namespace Dudo1985\WPDocGen;

if (!class_exists('Dudo1985\WPDocGen\Printer')) {

    class Printer {

        const FORMAT_FIRST_INDENT = "%-2s";

        /**
         * Print newline char
         *
         * @param  int $num_of_newlines
         * @return void
         * @author Dario Curvino <@dudo>
         *
         * @since 2.0.0
         */
        public function newline(int $num_of_newlines = 1): void {
            if($num_of_newlines < 1) {
                $num_of_newlines = 1;
            }
            if($num_of_newlines > 10) {
                $num_of_newlines = 10;
            }

            for($i=1; $i <= $num_of_newlines; $i++) {
                echo "\n";
            }
        }

        /**
         * Just do echo with "\n"
         *
         * @param $message
         * @return void
         * @author Dario Curvino <@dudo>
         *
         * @since 1.02
         */
        public function message($message): void {
            echo $message . "\n";
        }

        /**
         * @param $message
         * @return void
         * @author Dario Curvino <@dudo>
         *
         * @since 2.0.0
         */
        public function error($message): void {
            echo ANSI_BOLD . ANSI_RED .' Error:'. ANSI_RESET. ' ' .$message ."\n";
        }


        /**
         * Message + background color for dir name
         *
         * @param $message
         * @param $folder
         * @return void
         * @since 2.0.0
         * @author Dario Curvino <@dudo>
         *
         */
        public function messageWithBackground($message, $message_in_bg): void {
           echo $message . $this->returnStringWithBackground($message_in_bg) ."\n";
        }

        /**
         * print green text
         *
         * @param $message
         * @return void
         * @author Dario Curvino <@dudo>
         *
         * @since 2.0.0
         */
        public function messageGreen($message): void {
            echo ANSI_GREEN . $message . ANSI_RESET ."\n";
        }

        /**
         * Echo options row
         *
         * @param $options
         * @param $description
         * @return void
         * @since 2.0.0
         * @author Dario Curvino <@dudo>
         *
         */
        public function helpOption ($options, $description): void {
            $format_options_width     = "%-28s";
            $format_description_text  = "%s\n";

            $format = self::FORMAT_FIRST_INDENT . $format_options_width . $format_description_text;

            $options     = ANSI_LIGHT_YELLOW . $options . ANSI_RESET;
            $description = ANSI_BOLD . $description . ANSI_RESET;

            //print the string, first param is empty space
            echo sprintf($format, '', $options , $description);
        }

        /**
         * Print two lines, the first in italic and the second with nackground
         *
         * @param $description
         * @param $example
         * @return void
         * @since 2.0.0
         * @author Dario Curvino <@dudo>
         *
         */
        public function helpExamples ($description, $example): void {
            $description = WPDocGen::removeMultipleWhitespaces($description);
            $description = ANSI_ITALIC. $description. ANSI_RESET;
            $example     = $this->returnStringWithBackground($example);

            $format = self::FORMAT_FIRST_INDENT ."%s\n" . self::FORMAT_FIRST_INDENT . "%s\n";

            echo sprintf($format, '', $description, '', $example);
        }

        /**
         * Add ANSI_BG_DARK_GREY to a string
         *
         * @param $string
         * @return string
         * @author Dario Curvino <@dudo>
         *
         */
        public function returnStringWithBackground ($string): string {
            return ANSI_BG_DARK_GREY . ($string) . ANSI_RESET;
        }
    }
}
