<?php

declare(strict_types=1);

function circularArrayRotation($a, $k, $queries) {
    // Write your code here
    $c = [];
    $cnt = count($a);
    $k2 = $k % $cnt;

    $begin = array_slice($a, 0, $cnt - $k2);
    $end = array_slice($a, $cnt - $k2);

    $b = array_merge($end, $begin);

    foreach ($queries as $q) {
        $c[] = $b[$q];
    }

    return $c;
}

$arr = [1, 2, 3];
$qu = [0, 1, 2];

var_dump(circularArrayRotation($arr, 6, $qu)); die();
