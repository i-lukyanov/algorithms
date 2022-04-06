<?php

declare(strict_types=1);

class Wealth
{
    /**
     * @param int[][] $accounts
     * @return int
     */
    function maximumWealth(array $accounts): int
    {
        $wealth = [];

        foreach ($accounts as $key => $account) {
            $wealth[$key] = array_sum($account);
        }

        return array_reduce(
            $wealth,
            function (int $carry, int $item) {
                return (($item > $carry) ? $item : $carry);
            },
            0
        );
    }
}

$w = new Wealth();
var_dump($w->maximumWealth([[2,8,7],[7,1,3],[1,9,5]])); die();
