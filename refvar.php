<?php
$a = 5;
$b = &$a;

$b++;

echo $a . ' => ' . $b;