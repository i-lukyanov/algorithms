<?php

declare(strict_types=1);

function factorial (int $n): int
{
    $res = 1;

    if ($n > 0) {
        $res = $n * factorial($n - 1);
    }

    return $res;
}

var_dump(factorial(3)); die();
