<?php

declare(strict_types=1);

function lengthOfLongestSubstring(string $s): int
{
    if ($s === '') {
        return 0;
    }

    $sa = str_split($s);
    $n = count($sa);

    $start = $result = 0;
    $charIndexMap = [];

    for ($end = 0; $end < $n; $end++) {
        $duplicateIndex = $charIndexMap[$sa[$end]] ?? -1;
        if ($duplicateIndex > -1) {
            $result = max($result, $end - $start);

            for ($i = $start; $i <= $duplicateIndex; $i++) {
                unset($charIndexMap[$sa[$i]]);
            }

            $start = $duplicateIndex + 1;
        }

        $charIndexMap[$sa[$end]] = $end;
    }

    $result = max($result, $n - $start);

    return $result;
}

var_dump(lengthOfLongestSubstring('abcabcbb'));
var_dump(lengthOfLongestSubstring('bbbbb'));
var_dump(lengthOfLongestSubstring('pwwkerw'));
var_dump(lengthOfLongestSubstring('')); die();
