<?php

require_once 'src/Math.php';

require_once 'src/Rotate.php';

$math = new Sfp\Math('assets/tabular.csv');
echo "Result of Sfp\\Math->execute(): {$math->execute()}".PHP_EOL;

$rotate = new Sfp\Rotate(1, 'assets/rotate.json');
$rotateResult = $rotate->execute();
echo 'Result of Sfp\\Rotate->execute(): '.PHP_EOL;
var_dump($rotateResult);
