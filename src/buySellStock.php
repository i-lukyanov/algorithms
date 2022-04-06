<?php

declare(strict_types=1);

class ProfitManager
{
    public function maxProfit(array $prices): int
    {
        $profit = 0;
        $daysLen = count($prices);
        $priceDays = [];

        $minDay = 0;
        $minPrice = 10000;
        foreach ($prices as $day => $price) {
            if (!array_key_exists($price, $priceDays)) {
                $priceDays[$price] = $day;
            }
        }

        ksort($priceDays);

        $dayProfit = 0;
        foreach ($priceDays as $p => $pDay) {
            $dayProfit =
        }

        return $profit;
    }
}
