<?php

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
