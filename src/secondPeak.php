<?php

declare(strict_types=1);

function secondPeak(array $arr)
{
    $arrLen = count($arr);
    $ms = ($arr[0] > $arr[1])
        ? ['max' => $arr[0], 'second' => $arr[1]]
        : ['max' => $arr[1], 'second' => $arr[0]];
    echo 'Init values: `' . $ms['max'] . ', ' . $ms['second'] . "`\n";

    for ($i = 2; $i < $arrLen; $i++) {
        if ($arr[$i] > $ms['max']) {
            $ms['second'] = $ms['max'];
            $ms['max'] = $arr[$i];
        } elseif (
            $arr[$i] < $ms['max']
            && $arr[$i] > $ms['second']
        ) {
            $ms['second'] = $arr[$i];
        }
        echo 'Loop values: `' . $arr[$i] . '` - `' . $ms['max'] . ', ' . $ms['second'] . "`\n";
    }

    return $ms['second'];
}

$a = [-59, -36, -13, 1, -53, -92, -2, -96, -54, 75];
var_dump(secondPeak($a)); die();
