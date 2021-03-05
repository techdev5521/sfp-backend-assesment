<?php

namespace Sfp;

    /**
     * Singleton class to compute average values of valid data.
     *
     * @author Justin Campbell <campb303@purdue.edu>
     */
    class Rotate
    {
        private $rotationAmount;
        private $dataFile;

        /**
         * @param int    $rotationAmount Number of times to perform a left rotation.
         * @param string $dataFile       Path to the file containing a JSON array to rotate.
         */
        public function __construct($rotationAmount = 0, $dataFile = '../assets/rotate.json')
        {
            $this->rotationAmount = $rotationAmount;
            $this->dataFile = $dataFile;
        }

        /**
         * Returns a left rotated array.
         *
         * @param null|int $rotationAmount The number of times to perform a left rotation. (Default $this->rotationAmount)
         *
         * @return array Rotated array.
         */
        public function execute($rotationAmount = null)
        {
            $rotationAmount = $rotationAmount ?? $this->rotationAmount;

            // Load data from file.
            $data = $this->loadData() or exit("Could not load data from data file at {$this->dataFile}");

            // Parse data.
            $parsedData = json_decode($data);
            if (null === $parsedData) {
                exit('Could not parse data.');
            }

            // Check for correct data type.
            $dataNotArray = !is_array($parsedData);
            if ($dataNotArray) {
                exit('Data is not an array.');
            }

            // Rotate data.
            for ($i = 0; $i < $rotationAmount; ++$i) {
                $this->leftRotateOnce($parsedData) or exit('Could not rotate array.');
            }

            return $parsedData;
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
            } catch (\Exception $e) {
                return false;
            }

            return $data;
        }

        /**
         * Left rotate array by one.
         *
         * @param array &$array Pointer to the array to rotate.
         *
         * @return bool True on success, false on failure.
         */
        private function leftRotateOnce(&$array)
        {
            // Check if array is too small to rotate.
            if (count($array) <= 1) {
                return false;
            }

            // Store first array element.
            $firstElement = $array[0];

            // Get array length.
            $array_length = count($array);

            // Shift values left.
            for ($i = 0; $i < $array_length - 1; ++$i) {
                $array[$i] = $array[$i + 1];
            }

            // Add first array element to end.
            $array[$array_length - 1] = $firstElement;

            return true;
        }
    }
