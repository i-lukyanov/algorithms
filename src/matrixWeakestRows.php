<?php

declare(strict_types=1);

class matrixWeakestRows
{

    /**
     * @param int[][] $mat
     * @param int $k
     * @return int[]
     */
    function kWeakestRows(array $mat, int $k): array
    {
        $weakMat = [];

        foreach ($mat as $key => $row) {
            $str = 0;
            foreach ($row as $man) {
                if ($man === 0) {
                    break;
                }

                $str += $man;
            }

            $weakMat[] = [
                'row' => $key,
                'str' => $str,
            ];
        }

        usort(
            $weakMat,
            function (array $a, array $b) {
                return $a['str'] <=> $b['str'];
            }
        );

        $res = [];
        for ($i = 0; $i < $k; $i++) {
            $res[] = $weakMat[$i]['row'];
        }

        return $res;
    }
}

$mw = new matrixWeakestRows();
var_dump($mw->kWeakestRows([[1,1,0,0,0],
                            [1,1,1,1,0],
                            [1,0,0,0,0],
                            [1,1,0,0,0],
                            [1,1,1,1,1]], 3)); die();
