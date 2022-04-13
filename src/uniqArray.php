<?php

declare(strict_types=1);

/*Input: nums = [0,0,1,1,1,2,2,3,3,4]
Output: 5, nums = [0,1,2,3,4,_,_,_,_,_]
*/

function uniqArr(array $arr): array
{
    $arrCnt = count($arr);

    $resCounter = 0;
    for ($i = 1; $i < $arrCnt; $i++) {
        if ($arr[$resCounter] !== $arr[$i]) {
            $arr[++$resCounter] = $arr[$i];
        }

        unset($arr[$i]);
    }

    return $arr;
}

var_dump(uniqArr([0,0,1,1,1,2,2,3,3,4])); die();
