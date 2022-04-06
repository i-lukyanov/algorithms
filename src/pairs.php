<?php

declare(strict_types=1);

function pairs($k, $arr) {
    $pairCnt = 0;
    $l = 0;
    $r = 0;

    sort($arr);
    $arrCnt = count($arr);

    while($r < $arrCnt) {
        if($k === ($arr[$r] - $arr[$l])) {
            $pairCnt++;
            $l++;
            $r++;
        } elseif ($k < ($arr[$r] - $arr[$l])) {
            $l++;
        } else {
            $r++;
        }
    }

    return $pairCnt;
}

var_dump(pairs(2, [1, 5, 3, 4, 2, 7])); die();
