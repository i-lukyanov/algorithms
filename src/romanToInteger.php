<?php

declare(strict_types=1);

var_dump(
    (40.89 * 0.36 + 40.48 * 0.24 - 41.2 * 0.3 + 40.45 * 0.24 + 40.23 * 0.24 + 40.27 * 0.24) / 1.02
); die();

class romanToInteger
{
    private $romanIntMap = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $sArr = str_split($s);
        $sLen = count($sArr);

        $res = 0;
        $i = 1;

        while ($i <= $sLen) {
            $first = $this->romanIntMap[$sArr[$i - 1]];
            $second = isset($sArr[$i], $this->romanIntMap[$sArr[$i]]) ? $this->romanIntMap[$sArr[$i]] : 0;

            if ($first >= $second) {
                $res += $first;

                $i++;

                continue;
            }

            $res -= $first;
            $res += $second;

            $i += 2;
        }

        return $res;
    }
}

var_dump((new romanToInteger())->romanToInt('MMMCMXCIX'));
var_dump((new romanToInteger())->romanToInt('CMLXXXVI'));
var_dump((new romanToInteger())->romanToInt('MCMXCIV')); die();
