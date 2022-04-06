<?php

declare(strict_types=1);

$arr = [1001458909, 1004570889, 1007019111, 1003302837, 1002514638, 1006431461, 1002575010, 1007514041, 1007548981, 1004402249];

function aVeryBigSum($ar) {
    // Write your code here

    return array_reduce(
        $ar,
        function ($carry, $item) {
            $carry = (string)$carry;
            $item = (string)$item;

            $result = '';
            $inMind = 0;
            $maxLength = max(strlen($carry), strlen($item));

            $carry = str_pad($carry, $maxLength, '0', STR_PAD_LEFT);
            $item = str_pad($item, $maxLength, '0', STR_PAD_LEFT);

            for ($i = $maxLength - 1; $i >= 0; $i--) {
                $x1 = (int)$carry[$i];
                $x2 = (int)$item[$i];

                $sum = $x1 + $x2 + $inMind;

                $inMind = 0;
                if ($sum > 9) {
                    $inMind = 1;
                    $sum = $sum % 10;
                }

                $result = $sum . $result;
            }

            if ($inMind > 0) {
                $result = $inMind . $result;
            }

            return $result;
        },
        ''
    );
}

var_dump(aVeryBigSum($arr)); die();
