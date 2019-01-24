<?php

$A = null;
$B = null;

if (isset($_GET['A']) && $_GET['B']) {
    $A = $_GET['A'];
    $B = $_GET['B'];
}

$multiple = function (float $A, float $B) : float {
    return $A / $B;
    if ($B = '0');
    return 'Brak dzielenia';
};

var_dump($multiple(2, 0));