<?php

declare(strict_types=1);

/*
Дана строка, например "aafbaaaaffc"
Вывести для каждого символа в ней максимальное количество непрерывных повторений этого символа в строке.
Для данной строки, например, результат будет:
a:4
b:1
f:2
c:1
*/

function maxRepeats(string $str): array
{
    $inputArray = str_split($str);

    $result = [];
    $repeats = [];
    foreach ($inputArray as $key => $letter) {
        if ($key === 0 || !array_key_exists($letter, $repeats)) {
            $repeats[$letter]['repeats'] = 1;
            $repeats[$letter]['max_repeats'] = 1;

            continue;
        }

        if ($inputArray[$key] != $inputArray[$key - 1]) {
            $repeats[$letter]['repeats'] = 1;
            $repeats[$inputArray[$key - 1]]['repeats'] = 0;

            continue;
        }

        $repeats[$letter]['repeats']++;
        if (
            !isset($repeats[$letter]['max_repeats']) ||
            $repeats[$letter]['repeats'] > $repeats[$letter]['max_repeats']
        ) {
            $repeats[$letter]['max_repeats'] = $repeats[$letter]['repeats'];
        }
    }

    foreach ($repeats as $ch => $repeat) {
        $result[$ch] = $repeat['max_repeats'];
    }

    return $result;
}

var_dump(maxRepeats('aafbaaaaffc'));
var_dump(maxRepeats('aba'));
var_dump(maxRepeats('aaba'));
var_dump(maxRepeats('abaa')); die();
