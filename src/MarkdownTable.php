<?php
namespace Dudo1985\WPDocGen;

if (!class_exists('Dudo1985\WPDocGen\MarkdownTable')) {

    /**
     * Class MarkdownTable
     *
     * @package Dudo1985\MarkdownTable
     *
     * This class is used to generate a markdown table by providing headers and rows.
     */
    class MarkdownTable {

        /**
         * An array containing the headers of the markdown table.
         *
         * @var array
         */
        private array $headers = [];

        /**
         *  An array containing the rows of the markdown table.
         *
         * @var array
         */
        private array $rows = [];

        /**
         * This method is used to add a header to the markdown table. It accepts a string or an array of strings as an argument.
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param string|array $headers
         *
         * @return void
         */
        public function addHeader(string|array $headers): void {
            if (is_array($headers)) {
                foreach ($headers as $header) {
                    $this->headers[] = $header;
                }
            }
            else {
                $this->headers[] = $headers;
            }
        }

        /**
         * This method is used to add a row to the markdown table. It accepts a string or an array of strings as an argument.
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         *
         * @param string|array $row
         *
         * @return void
         */
        public function addRow(string|array $row): void {
            $this->rows[] = $row;
        }

        /**
         * This method is used to generate the markdown table. It returns a string that contains the entire markdown table.
         *
         * @author Dario Curvino <@dudo>
         * @since  1.0.0
         * @return string
         */
        public function getTable(): string {
            // Add headers to table
            $table = '|' . implode(' | ', $this->headers) . " |\n";

            // Add separator row to table
            $table .= '|' . str_repeat(' --- |', count($this->headers)) . "\n";

            // Add rows to table
            foreach ($this->rows as $row) {
                $table .= '|' . implode(' | ', $row) . " |\n";
            }

            return $table;
        }

    }

}
