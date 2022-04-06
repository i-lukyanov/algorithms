<?php

declare(strict_types=1);
//$r = [1, 3, 5, 5, 24, 8, 11, 8, 55, 18];
//var_dump(array_flip($r)); die();

$testArr = [
    [1, 2, 3, 4, 5],
    [2, 3, 4, 5, 6],
    [3, 5, 6, 14, 15],
    [1, 5, 6, 56, 69]
];

/**
 * @param array $arr
 * @return false|int
 *
 * n = m * k
 * m = count($arr)
 * k = count($arr[0])
 */
function getArrayMinCommonElement(array $arr)
{
    $arrCnt = count($arr);
    $firstCnt = count($arr[0]);
    $maxFirst = $arr[0][0];
    $minLast = $arr[0][$firstCnt - 1];

    for ($i = 1; $i < $arrCnt; $i++) {
        if ($maxFirst < $arr[$i][0]) {
            $maxFirst = $arr[$i][0];
        }

        $curCnt = count($arr[$i]);
        if ($minLast > $arr[$i][$curCnt - 1]) {
            $minLast = $arr[$i][$curCnt - 1];
        }
    }

    $countsArr = [];
    $lastArr = array_pop($arr);

    foreach ($lastArr as $lastArrItem) {
        if (
            $lastArrItem < $maxFirst
            || $lastArrItem > $minLast
        ) {
            continue;
        }

        $countsArr[$lastArrItem] = 0;

        foreach ($arr as $curArr) {
            $curCommonItem = binarySearch($curArr, $lastArrItem);
            if ($curCommonItem === false) {
                continue 2;
            }

            $countsArr[$lastArrItem]++;
        }

        if ($countsArr[$lastArrItem] === $arrCnt - 1) {
            return $lastArrItem;
        }
    }

    return false;
}

function binarySearch(array $arr, int $needle)
{
    $arrCnt = count($arr);
    $start = 0;
    $end = $arrCnt - 1;

    while ($start <= $end) {
        $mid = (int)floor(($end + $start) / 2);

        if ($arr[$mid] === $needle) {
            return $mid;
        }

        if ($arr[$mid] < $needle) {
            $start = $mid + 1;
        } else {
            $end = $mid - 1;
        }
    }

    return false;
}


var_dump(getArrayMinCommonElement($testArr)); die();
