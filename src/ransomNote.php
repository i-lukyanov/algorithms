<?php

declare(strict_types=1);

class ransomNote {

    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    function canConstruct($ransomNote, $magazine)
    {
        $ransomLen = strlen($ransomNote);
        $magLen = strlen($magazine);
        if ($ransomLen > $magLen) {
            return false;
        }

        $ransomArr = str_split($ransomNote);
        $magArr = str_split($magazine);

        $magStack = [];

        for ($i = 0; $i < $magLen; $i++) {
            if (array_key_exists($magArr[$i], $magStack)) {
                $magStack[$magArr[$i]]--;
            } else {
                $magStack[$magArr[$i]] = -1;
            }
        }

        for ($i = 0; $i < $ransomLen; $i++) {
            if (array_key_exists($ransomArr[$i], $magStack)) {
                $magStack[$ransomArr[$i]]++;
            } else {
                $magStack[$ransomArr[$i]] = 1;
            }
        }

        foreach ($magStack as $item) {
            if ($item > 0) {
                return false;
            }
        }

        return true;
    }
}

var_dump((new ransomNote())->canConstruct('assa', 'asssaaa'));
