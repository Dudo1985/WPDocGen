<?php
/**
 * Helper class to print into the terminal
 *
 * @since 1.0.2
 * @author Dario Curvino <@dudo>
 */

namespace Dudo1985\WPDocGen;

if (!class_exists('Dudo1985\WPDocGen\Printer')) {

    class Printer {

        /**
         * Print newline char
         *
         * @param  int $num_of_newlines
         * @return void
         * @author Dario Curvino <@dudo>
         *
         * @since 1.0.2
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
         * @since 1.0.2
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
         * @since 1.0.2
         * @author Dario Curvino <@dudo>
         *
         */
        public function messageWithDir($message, $folder): void {
           echo $message . ANSI_BG_DARK_GREY . $folder . ANSI_RESET ."\n";
        }

        /**
         * print green text
         *
         * @param $message
         * @return void
         * @author Dario Curvino <@dudo>
         *
         * @since 1.0.2
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
         * @since 1.0.2
         * @author Dario Curvino <@dudo>
         *
         */
        public function helpOption ($options, $description): void {
            $format_first_indent      = "%-2s";
            $format_options_width     = "%-28s";
            $format_description_text  = "%s\n";

            $format = $format_first_indent . $format_options_width . $format_description_text;

            $options     = ANSI_LIGHT_YELLOW . $options . ANSI_RESET;
            $description = ANSI_BOLD . $description . ANSI_RESET;

            //print the string, first param is empty space
            echo sprintf($format, '', $options , $description);
        }
    }

}
