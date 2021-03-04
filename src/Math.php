<?php

namespace Sfp;

    /**
     * Singleton class to compute average values of valid data.
     *
     * @author Justin Campbell <campb303@purdue.edu>
     */
    class Math
    {
        private $dataFile;

        /**
         * @param string $dataFile path to file containing data. (Default '../src/Math.csv')
         */
        public function __construct($dataFile = '../assets/tabular.csv')
        {
            $this->dataFile = $dataFile;
        }

        /**
         * Returns average of true values.
         *
         * @return float average of true values
         */
        public function execute()
        {
        }

        /**
         * Returns string of data or false if data cannot be loaded.
         *
         * @return bool|string String of data or false
         */
        private function loadData()
        {
            // Check if file exists.
            $dataFileNotFound = !file_exists($this->dataFile);
            if ($dataFileNotFound) {
                return false;
            }

            // Get data from contents.
            try {
                $dataFileStream = fopen($this->dataFile, 'r');
                if (false === $dataFileStream) {
                    return false;
                }

                $data = stream_get_contents($dataFileStream);

                fclose($dataFileStream);
            } catch (Exception $e) {
                return false;
            }

            return $data;
        }

        /**
         * Parses a singgle CSV line.
         *
         * @param string $line the line to parse
         *
         * @return array|bool array or false
         */
        private function parseLine($line = '')
        {
            if ('' === $line) {
                return false;
            }

            // Break line into fields.
            $fields = explode(',', $line);

            // Check for correct number of fields.
            if (3 != count($fields)) {
                return false;
            }

            // Convert second field to a number:
            // Check for special special case 0:
            if ('0' === $fields[1]) {
                $fields[1] = 0;
            } elseif (0 !== intval($fields[1])) {
                $fields[1] = intval($fields[1]);
            } else {
                return false;
            }

            // Convert third field to a boolean.
            $stringValue = strtolower($fields[2]);
            if ('true' === $stringValue) {
                $fields[2] = true;
            } elseif ('false' === $stringValue) {
                $fields[2] = false;
            } else {
                return false;
            }

            // Build record.
            return [
                'key' => $fields[0],
                'value' => $fields[1],
                'accept' => $fields[2],
            ];
        }

        /**
         * Parses a CSV string into a multi-dimensional associative array.
         *
         * @param string $data CSV string to parse
         *
         * @return array|bool array or false if parsing failed
         */
        private function parseData($data = '')
        {
            if ('' === $data) {
                return false;
            }

            // Detect newline character.
            $crlf_exists = strpos($data, "\r\n");
            $lf_exists = strpos($data, "\n");
            // No line endings detected:
            if (!($crlf_exists or $lf_exists)) {
                return false;
            }
            // CRLF exists:
            if ($crlf_exists and !$lf_exists) {
                $newlineCharacter = "\r\n";
            }
            // LF exists:
            else {
                $newlineCharacter = "\n";
            }

            // Make array of reccords.
            $records = explode($newlineCharacter, $data);

            // Build array of reccords ignoring the first, title row and last, empty row.
            $parsedData = [];
            for ($i = 1; $i < count($records) - 1; ++$i) {
                $parsedLine = $this->parseLine($records[$i]);
                $parsedData[$i - 1] = $parsedLine;
            }

            return $parsedData;
        }
    }
