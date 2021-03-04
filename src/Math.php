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
    }
