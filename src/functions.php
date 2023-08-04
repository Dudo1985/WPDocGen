<?php

namespace Dudo1985\WPDocGen;

/**
 * Find if the current line is a markdown header (string begin with #)
 *
 * @author Dario Curvino <@dudo>
 * @since 2.0.3
 *
 * @param $line
 *
 * @return bool
 */
function is_header ($line):bool {
    if(str_starts_with($line, '#')) {
        return true;
    }
    return false;
}

/**
 * Check if the provided word is an argument
 *
 * @param $word
 *
 * @return bool
 * @author Dario Curvino <@dudo>
 * @since  1.0.0
 *
 */
function is_argument($word): bool {
    if (str_starts_with($word, '$')) {
        return true;
    }
    return false;
}

/**
 * Check if the provided string begin with a tag
 *
 * @author Dario Curvino <@dudo>
 *
 * @param $string
 *
 * @since  1.0.0
 *@return bool
 */
function is_tag($string): bool {
    if (str_starts_with($string, '@')) {
        $possible_tag = find_first_word($string);
        if(PhpDocumentor::isTag($possible_tag) === true) {
            return true;
        }
    }
    return false;
}

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