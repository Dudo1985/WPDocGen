<?php
/**
 * @since  2.0.2
 * @author Dario Curvino <@dudo>
 *
 */
namespace Dudo1985\WPDocGen;

class phpDocumentor {
    public $tags = array (
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

    /**
     * Return true if the given string is a phpDocTag, false otherwise
     *
     * @param $string
     * @return bool
     * @author Dario Curvino <@dudo>
     *
     * @since 2.0.2
     */
    public function isTag ($string) {
        foreach ($this->tags as $tag) {
            if ($tag === $string) {
                return true;
            }
        }
        return false;
    }
}
