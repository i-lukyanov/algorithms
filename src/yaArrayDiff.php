<?php

declare(strict_types=1);

/**
 * Даны две последовательности чисел, отсортированные по неубыванию
 * Необходимо вывести все элементы первой последовательности, которые не попадают во вторую последовательность
 * [1, 2, 3], [3, 4] -> [1, 2]
 *
 * @param int[] $a1
 * @param int[] $a2
 * @return int[]
 */
function arrayDiff(array $a1, array $a2): array
{
    $len1 = count($a1);
    $len2 = count($a2);

    if ($len1 === 0) {
        return [];
    }

    $result = [];
    $cnt1 = $cnt2 = 0;
    while ($cnt1 < $len1) {
        if ($cnt2 >= $len2 || $a1[$cnt1] < $a2[$cnt2]) {
            $result[] = $a1[$cnt1];
            $cnt1++;

            continue;
        }

        if ($a1[$cnt1] === $a2[$cnt2]) {
            $cnt1++;

            continue;
        }

        if ($a1[$cnt1] > $a2[$cnt2]) {
            $cnt2++;
        }
    }

    return $result;
}

var_dump(arrayDiff([1, 2, 3, 3, 5, 6, 8], [3, 4, 6, 8]));
var_dump(arrayDiff([1, 2, 3, 8], [3, 4, 6, 8, 10]));
var_dump(arrayDiff([], [3, 4, 6, 8]));
var_dump(arrayDiff([1, 2, 3, 3, 5, 6, 8], []));
var_dump(arrayDiff([1, 2, 3, 3, 5, 6, 8], [10, 13, 15])); die();
