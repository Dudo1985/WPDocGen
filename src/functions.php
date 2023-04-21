<?php

namespace Dudo1985\WPDocGen;

/**
* Return the first word of a string
*
* @param $string
*
* @return false|string
* @author Dario Curvino <@dudo>
* @since  1.0.0
*
*/
function find_first_word($string): bool|string {
    return strtok($string, ' '); // First word of the string
}


/**
 * If a string begin with a provided char, remove it
 *
 * @author Dario Curvino <@dudo>
 * @since  2.0.2
 *
 * @param $string
 * @param $char   | The char to remove
 *
 * @return string|null
 */
function remove_char_begin_string ($string, $char): string|null {
    //remove all the * at the beginning of the string, if exists
    if (str_starts_with($string, $char)) {
        return trim(substr($string, 1));
    }
    return null;
}