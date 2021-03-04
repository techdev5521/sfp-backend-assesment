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
    }
