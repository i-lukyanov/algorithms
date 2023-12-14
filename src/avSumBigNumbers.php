<?php

declare(strict_types=1);

// Мы хотим складывать очень большие числа, которые превышают емкость базовых типов,
// поэтому мы храним их в виде массива неотрицательных чисел.

// Нужно написать функцию, которая примет на вход два таких массива, вычислит сумму чисел,
// представленных массивами, и вернет результат в виде такого же массива.

// # Пример 1
// # ввод
// arr1 = [1, 2, 3] # число 123
// arr2 = [4, 5, 6] # число 456
// # вывод
// res = [5, 7, 9] # число 579. Допустим ответ с первым незначимым нулем [0, 5, 7, 9]
// # Пример 2
// # ввод
// # ввод
// arr1 = [5, 4, 4] # число 544
// arr2 = [4, 5, 6] # число 456
// # вывод
// res = [1, 0, 0, 0] # число 1000


// [6, 6] + [8]
function numSum(array $num1, array $num2): array
{
    $len1 = count($num1);
    $len2 = count($num2);
    $zeros = [];
    $maxNum = $num1;
    $minNum = $num2;
    $result = [];

    if ($len1 != $len2) {
        $maxLen = $len1;
        $minLen = $len2;

        if ($len1 < $len2) {
            $maxLen = $len2;
            $minLen = $len1;
            $minNum = $num1;
            $maxNum = $num2;
        }

        for ($i = 0; $i < $maxLen - $minLen; $i++) {
            $zeros[] = 0;
        }

        $minNum = array_merge($zeros, $minNum);
    }

    // [9, 9] + [1]
    $rest = 0;
    for ($j = $maxLen - 1; $j >= 0; $j--) {
        $nextDigit = $minNum[$j] + $maxNum[$j] + $rest;
        if ($nextDigit >= 10) {
            $nextDigit = ($nextDigit) % 10;
            $rest = 1;
        } else {
            $rest = 0;
        }

        $result[$j] = $nextDigit;
    }

    if ($rest > 0) {
        $begin = [$rest];
        $result = array_merge($begin, $result);
    }

    return $result;
}
