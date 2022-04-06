<?php

declare(strict_types=1);

/*
 * Complete the 'countApplesAndOranges' function below.
 *
 * The function accepts following parameters:
 *  1. INTEGER s
 *  2. INTEGER t
 *  3. INTEGER a
 *  4. INTEGER b
 *  5. INTEGER_ARRAY apples
 *  6. INTEGER_ARRAY oranges
 */

function countApplesAndOranges($s, $t, $a, $b, $apples, $oranges): void {
    $appleCount = 0;
    $orangeCount = 0;

    foreach ($apples as $appleDist) {
        $curPos = $a + $appleDist;
        if (
            $curPos >= $s
            && $curPos <= $t
        ) {
            $appleCount++;
        }
    }

    foreach ($oranges as $orangeDist) {
        $curPos = $b + $orangeDist;
        if (
            $curPos >= $s
            && $curPos <= $t
        ) {
            $orangeCount++;
        }
    }

    echo $appleCount . "\n";
    echo $orangeCount . "\n";
}
