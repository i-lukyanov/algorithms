<?php

declare(strict_types=1);

class numberReduce
{
    /**
     * @param int $num
     * @return int
     */
    function numberOfSteps(int $num): int
    {
        $nmb = $num;
        $cnt = 0;
        while ($nmb > 0) {
            if ($nmb % 2 === 0) {
                $nmb /= 2;
            } else {
                $nmb--;
            }

            $cnt++;
        }

        return $cnt;
    }
}

$nr = new numberReduce();
var_dump($nr->numberOfSteps(14));
var_dump($nr->numberOfSteps(8));
var_dump($nr->numberOfSteps(123)); die();
