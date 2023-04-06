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
