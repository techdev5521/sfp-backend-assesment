<?php

namespace Sfp;

require_once 'Rotate.php';

    /**
     * Singleton class that extends Rotate and returns the last element in a rotated array.
     *
     * @author Justin Campbell <campb303@purdue.edu>
     */
    class Extend extends Rotate
    {
        /**
         * Returns the last element in a rotated array.
         *
         * @param null|int $rotationAmount The number of times to perform a left rotation. (Default $this->rotationAmount)
         *
         * @return bool|mixed Last element in a rotated array or false on failure.
         */
        public function execute($rotationAmount = null)
        {
            $rotatedArray = parent::execute();

            return $rotatedArray[count($rotatedArray) - 1];
        }
    }
