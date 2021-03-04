<?php

require_once 'src/Math.php';

$math = new Sfp\Math('assets/tabular.csv');
echo "Result of Sfp\\Math->execute(): {$math->execute()}".PHP_EOL;
