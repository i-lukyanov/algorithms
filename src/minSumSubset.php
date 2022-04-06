<?php

/*
 * Complete the 'blacklist' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY amounts as parameter.
 */

// НЕ ДОДЕЛАЛ
function blacklist($amounts) {
    // Write your code here
    $merc = count($amounts); // K
    $gang = count($amounts[0]); // N
    $subsets = [];

    for ($i = 0; $i < 100; $i++) {
        $subsets[$i][0] = 0;
    }

    for ($i = 0; $i < 100; $i++) {
        $subsets[0][$i] = 0;
    }

    for ($m = 0; $m < 100; $m++) {
        for ($g = 0; $g < 100; $g++) {
            if ($m === $g) {
                $subsets[$m][$g] = 1;

                continue;
            }

            for ($j = 1; $j < $g; $j++) {
                $subsets[$m][$g] = min($subsets[$m][$j] + $subsets[$m][$g - $j], $subsets[$m][$g]);
            }

            for ($j = 1; $j < $m; $j++) {
                $subsets[$m][$g] = min($subsets[$j][$g] + $subsets[$m - $j][$g], $subsets[$m][$g]);
            }

            $subsets[$g][$m] = $subsets[$m][$g];
        }
    }

    return $subsets[$gang][$merc];
}

var_dump(blacklist([[1,4,1], [2,2,2]])); die();

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$k = intval($first_multiple_input[1]);

$amounts = array();

for ($i = 0; $i < $k; $i++) {
    $amounts_temp = rtrim(fgets(STDIN));

    $amounts[] = array_map('intval', preg_split('/ /', $amounts_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = blacklist($amounts);

fwrite($fptr, $result . "\n");

fclose($fptr);
