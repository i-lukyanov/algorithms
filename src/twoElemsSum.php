<?php

declare(strict_types=1);

class ElemsSummer
{
    /**
     * @param int[] $nums
     * @param int $target
     * @return int[]
     */
    function twoSum(array $nums, int $target): array
    {
        $numsLen = $numsCnt = count($nums);
        $cnt = $numsLen;
        $res = [];

        while ($numsCnt > 1) {
            $last = array_pop($nums);
            $numsCnt--;

            foreach ($nums as $key => $num) {
                if ($last + $num === $target) {
                    $res = [$key, $numsCnt];

                    break 2;
                }
            }
        }

        return $res;
    }
}

$s = new ElemsSummer();
var_dump($s->twoSum([2,7,11,15], 18)); die();
