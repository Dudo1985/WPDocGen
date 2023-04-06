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
        public function HelpOption ($options, $description): void {
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
