<?php
/**
 *
 * @since  2.0.0
 * @author Dario Curvino <@dudo>
 */

namespace Dudo1985\WPDocGen;

use SplFileObject;

if (!class_exists('Dudo1985\WPDocGen\CommentParser')) {

    class CommentParser {
        /**
         * Given a file path and a line number, returns the documentation comment
         * preceding the line as a string.
         *
         * @param string $filePath The path of the file to analyze.
         * @param int $lineNumber The line number to analyze.
         *
         * @return array The documentation comment preceding the line as an array.
         */
        function getDocCommentByLine(string $filePath, int $lineNumber): array {
            $comment = []; //avoid undefined
            $file = new SplFileObject($filePath);
            $file->seek($lineNumber - 2); // positions on the previous line

            // Analyzes the previous lines to find the documentation comment
            $line = trim($file->current());

            //if the previous line is the end of the comment, get the text until /** (the begin of the comment) is reached
            if ($line === '*/') {
                while ($file->valid()) {
                    $file->seek($file->key() - 1);
                    $line = trim($file->current());

                    //found the beginning of the comment
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
         * Loops through a file to extract the comment block starting at the current line, and returns it as an array.
         *
         * @param $file | SplFileObject object
         *
         * @return array
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
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
                    } //also add newlines otherwise
                    else {
                        $comment['description'] .= "\n\n*" . $comment_line . '*';
                    }
                } //the line begin with a tag
                else {
                    $comment_line_no_tag = $this->removeTagFromString($comment_line);
                    $comment['args'][] = $comment_line_no_tag;
                }
                //go to next line
                $file->next();
            }
            return $comment;
        }

        /**
         * Removes the tag from the beginning of a string and returns the remaining text.
         *
         * @param string $string
         *
         * @return string|void
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
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
         * @param string $string the string where to search the type
         *
         * @return string
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
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
         * @param $string
         *
         * @return string
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
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
         * @param $string
         * @param $argument
         *
         * @return string
         * @since  1.0.0
         *
         * @author Dario Curvino <@dudo>
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
         * @param $string
         *
         * @return false|string
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         */
        public function findFirstWord($string): bool|string {
            return strtok($string, ' '); // First word of the string
        }

        /**
         * Check if the provided word is a tag
         *
         * @param $word
         *
         * @return bool
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
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
         * @param $word
         *
         * @return bool
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         */
        public function isArgument($word): bool {
            if (str_starts_with($word, '$')) {
                return true;
            }
            return false;
        }
    }

}
