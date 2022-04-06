<?php

declare(strict_types=1);

class SearchRotated
{
    public function search(array $arr, int $target): int
    {
        $shifted = [];
        $arrLen = count($arr);

        for ($i = 0; $i < $arrLen - 1; $i++) {
            $curElem = $arr[$i];
            $shifted[] = $curElem;
            unset($arr[$i]);

            if ($curElem > $arr[$i + 1]) {
                break;
            }
        }

        $shift = count($shifted);

        return max(
            $this->binarySearch($shifted, $target),
            $this->binarySearch($arr, $target, $shift)
        );
    }

    private function binarySearch(array $arr, int $needle, int $shift = 0): int
    {
        $arrCnt = count($arr);
        $start = $shift;
        $end = $arrCnt + $shift - 1;

        while ($start <= $end) {
            $mid = (int)floor(($end + $start) / 2);

            if ($arr[$mid] === $needle) {
                return $mid;
            }

            if ($arr[$mid] < $needle) {
                $start = $mid + 1;
            } else {
                $end = $mid - 1;
            }
        }

        return -1;
    }
}

$sr = new SearchRotated();

var_dump($sr->search([4,5,6,7,0,1,2], 0)); die();
