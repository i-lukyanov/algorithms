<?php

declare(strict_types=1);

/*
Input: [[1,3], [2,4], [2,6], [8,10], [15,18]]
Output: [[1,6], [8,10], [15,18]]
Explanation: Интервалы [1,3] и [2,6] пересекаются => объединяем в [1,6].
*/

function mergeIntervals(array $intervals): array
{
    $intCnt = count($intervals);

    usort(
        $intervals,
        function ($a, $b) {
            return $a[0] <=> $b[0];
        }
    );

    $res = [$intervals[0]];

    $k = 0;
    for ($i = 1; $i < $intCnt; $i++) {
        if ($res[$k][1] >= $intervals[$i][0]) {
            $res[$k] = [
                min($res[$k][0], $intervals[$i][0]),
                max($res[$k][1], $intervals[$i][1])
            ];
        } else {
            $res[++$k] = $intervals[$i];
        }
    }

    return $res;
}

var_dump(mergeIntervals([[1,3], [2,4], [2,6], [8,10], [15,18]])); die();