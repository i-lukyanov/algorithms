<?php

declare(strict_types=1);

function pleskString($input) {
    $rev = strrev($input);

    $replaced = preg_replace(
        [
            '/o/',
            '/e/',
            '/[^\s\w]+/',
        ],
        [
            'O',
            'E',
            '',
        ],
        $rev
    );

    return $replaced;
}

var_dump(pleskString('hello, world!')); die();
