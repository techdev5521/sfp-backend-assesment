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
         * @return array|bool Rotated array or false on failure.
         */
        public function execute($rotationAmount = null)
        {
            $rotationAmount = $rotationAmount ?? $this->rotationAmount;
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
