<?php

declare(strict_types=1);

//var_dump(numSum([6,6], [8]));
//var_dump(numSum([9,9], [1]));

// Дан массив целых чисел nums и целое число k. Нужно написать функцию,
// которая вынимает из массива k наиболее часто встречающихся элементов.

// # ввод
// nums = [1,1,1,2,2,3]
// k = 2
// # вывод (в любом порядке)
// [1, 2]
function freq(array $nums, int $k): array
{
    $freq = [];

    foreach ($nums as $num) {
        if (!array_key_exists($num, $freq)) {
            $freq[$num] = 0;
        }

        $freq[$num]++;
    }

    uasort(
        $freq,
        function ($a, $b) {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? 1 : -1;
        }
    );

    $result = [];
    $cnt = 0;
    foreach ($freq as $item => $fr) {
        if ($cnt >= $k) {
            break;
        }

        $result[] = $item;
        $cnt++;
    }

    return $result;
}

var_dump(freq([1,1,1,2,2,3,3,3,3,4,4], 2));
