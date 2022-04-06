<?php

declare(strict_types=1);

function minimumAbsoluteDifference($arr) {
    // Write your code here
    sort($arr);
    $arrCount = count($arr);

    $minDiff = PHP_INT_MAX;
    for ($i = 0; $i <= $arrCount - 2; $i++) {
        $currentDiff = abs($arr[$i] - $arr[$i + 1]);
        if ($currentDiff === 0) {
            return 0;
        }

        if ($currentDiff < $minDiff) {
            $minDiff = $currentDiff;
        }
    }

    return $minDiff;
}

$a = [-59, -36, -13, 1, -53, -92, -2, -96, -54, 75]; die();
