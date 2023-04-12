<?php
/**
 * @since  2.0.2
 * @author Dario Curvino <@dudo>
 *
 */
namespace Dudo1985\WPDocGen;

if (!class_exists('Dudo1985\WPDocGen\PhpDocumentor')) {

    class PhpDocumentor {

        /**
         * @return array
         * @since 2.0.2
         * @author Dario Curvino <@dudo>
         *
         */
        public static function returnTags(): array {
            return array(
                '@abstract',
                '@access',
                '@author',
                '@category',
                '@copyright',
                '@deprecated',
                '@example',
                '@final',
                '@filesource',
                '@global',
                '@ignore',
                '@internal',
                '@license',
                '@link',
                '@method',
                '@name',
                '@package',
                '@param',
                '@property',
                '@return',
                '@see',
                '@since',
                '@static',
                '@staticvar',
                '@subpackage',
                '@todo',
                '@tutorial',
                '@uses',
                '@var',
                '@version'
            );
        }

        /**
         * Return true if the given string is a phpDocTag, false otherwise
         *
         * @param $string
         * @return bool
         * @author Dario Curvino <@dudo>
         *
         * @since 2.0.2
         */
        public static function isTag($string): bool {
            if (in_array($string, self::returnTags(), true)) {
                return true;
            }
            return false;
        }
    }

} //end class
