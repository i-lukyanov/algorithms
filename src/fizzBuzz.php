<?php

declare(strict_types=1);

class FizzBuzzz
{
    /**
     * @param int $n
     * @return string[]
     */
    public function fizzBuzz(int $n): array {
        $result = [];

        for ($i = 1; $i <= $n; $i++) {
            $elem = '';

            if ($i % 3 === 0 || $i % 5 === 0) {
                if ($i % 3 === 0) {
                    $elem .= 'Fizz';
                }

                if ($i % 5 === 0) {
                    $elem .= 'Buzz';
                }
            } else {
                $elem = (string)$i;
            }

            $result[] = $elem;
        }

        return $result;
    }
}

$fb = new FizzBuzzz();

var_dump($fb->fizzBuzz(5));
var_dump($fb->fizzBuzz(15)); die();
