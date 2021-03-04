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
         */
        public function execute($rotationAmount)
        {
            $rotationAmount = $rotationAmount ?? $this->{$rotationAmount};
        }
    }
