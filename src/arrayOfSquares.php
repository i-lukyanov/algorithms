<?php

declare(strict_types=1);

// Сортированный массив квадратов
// [1, 2, 3] -> [1, 4, 9]

function getArrayOfSquares(array $arr): array {
    $zeroKeys = array_keys($arr, 0);
    $delimiterKey = $zeroKeys[0] ?? 0;

    $negArr = array_slice($arr, 0, $delimiterKey + 1);
    $posArr = array_slice($arr, $delimiterKey + 1);

    $negLength = count($negArr);
    $posLength = count($posArr);
    $maxLength = max(
        $posLength,
        $negLength
    );
    $negPointer = $negLength - 1;
    $posPointer = 0;

    $resultArr = [$posArr[$delimiterKey]];

    while (
        $negPointer >= 0
        || $posPointer < $posLength
    ) {
        if ($negPointer < 0) {
            $resultArr[] = $posArr[$posPointer] * $posArr[$posPointer];
            $posPointer++;

            continue;
        }

        if ($posPointer >= $posLength) {
            $resultArr[] = $negArr[$negPointer] * $negArr[$negPointer];
            $negPointer--;

            continue;
        }

        $negSquare = $negArr[$negPointer] * $negArr[$negPointer];
        $posSquare = $posArr[$posPointer] * $posArr[$posPointer];

        if ($negSquare <= $posSquare) {
            $resultArr[] = $negSquare;
            $negPointer--;

            continue;
        }

        $resultArr[] = $posSquare;
        $posPointer++;
    }

    return $resultArr;
}

var_dump(getArrayOfSquares([1, 2, 3])); die();
