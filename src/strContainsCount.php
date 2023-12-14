<?php

declare(strict_types=1);

/*
 * $r - камни
 * $j - драгоценности
 * нужно проверить, какое количество символов из S входит в J
 */

function strContainsCount(string $r, string $j): int
{
    if (strlen($r) === 0 || strlen($j) === 0) {
        return 0;
    }

    $rArray = str_split($r);
    $jArray = str_split($j);
    $rKeys = [];

    foreach ($rArray as $rock) {
        $rKeys[$rock] = 0;
    }

    $cnt = 0;
    foreach ($jArray as $jwl) {
        if (array_key_exists($jwl, $rKeys)) {
            $cnt++;
        }
    }

    return $cnt;
}

$fp = fopen('input.txt', 'rb');

$j = fgets($fp);
$r = fgets($fp);

var_dump(strContainsCount($r, $j));
var_dump(strContainsCount('ab', ''));
var_dump(strContainsCount('', 'ab')); die();
