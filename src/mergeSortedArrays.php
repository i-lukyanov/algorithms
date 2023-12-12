<?php

declare(strict_types=1);

function mergeS(array $arr1, array $arr2): array
{
    $arrLen1 = count($arr1);
    $arrLen2 = count($arr2);
    $maxLen = max($arrLen1, $arrLen2);

    $cnt1 = $cnt2 = 0;
    $result = [];
    while ($cnt1 < $maxLen && $cnt2 < $maxLen) {
        echo $cnt1 . ' | ' . $cnt2;
        if ($cnt1 >= $arrLen1 && $cnt2 < $arrLen2) {
            $result[] = $arr2[$cnt2];
            $cnt2++;
            continue;
        }

        if ($cnt2 >= $arrLen2 && $cnt1 < $arrLen1) {
            $result[] = $arr1[$cnt1];
            $cnt1++;
            continue;
        }

        if ($arr1[$cnt1] <= $arr2[$cnt2]) {
            $result[] = $arr1[$cnt1];
            $result[] = $arr2[$cnt2];
        } else {
            $result[] = $arr2[$cnt2];
            $result[] = $arr1[$cnt1];
        }

        $cnt1++;
        $cnt2++;
    }

    return $result;
}

var_dump(mergeS([1,2,3], [1,3,4,6,7])); die();
