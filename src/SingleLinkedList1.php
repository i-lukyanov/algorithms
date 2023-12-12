<?php

declare(strict_types=1);

/**
 * Definition for a singly-linked list.
 */
class ListNode1 {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}



class Solution1 {

    /**
     * @param ListNode1 $head
     * @return ListNode1
     */
    function reverseList(?ListNode1 $head): ?ListNode1 {
        if ($head === null) {
            return null;
        }

        $previous = null;
        $current = $head;
        $next = null;

        while ($next = $current->next) {
            $current->next = $previous;
            $previous = $current;
            $current = $next;
        }
        return $current;
    }

    function reverseList2(?ListNode1 $head): ?ListNode1 {

        $previous = null;
        $current = $head;
        $next = null;

        while ($current !== null) {
            $next = $current->next;
            $current->next = $previous;
            $previous = $current;
            $current = $next;
        }
        return $previous;
    }

    function reverseList3(?ListNode1 $head): ?ListNode1 {
        $prev = null;

        while (!is_null($head)) {
            $next = $head->next;
            $head->next = $prev;
            $prev = $head;

            $head = $next;
        }

        return $prev;
    }
}

/*
// 1 -> 2 -> 3 -> 4 -> 5 -> null
next = 2
1 -> null
prev = 1
head = 2
// ???
// null <- 1  2 -> 3 -> 4 -> 5 -> null
// ???
next = 3
2 -> 1
prev = 2
head = 3


// null <- 1 <- 2 <- 3 <- 4  5 -> null
// ???
next = null
5 -> 4
prev = 5


// null <- 1 <- 2 <- 3 <- 4 <- 5
*/


/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

//$node1->val = 2
// $node2->val = 2

//class Solution {
//    /**
//     * @param ListNode $head
//     * @return ListNode
//     */
//    function detectCycle($head) {
//
//    }
//}

// 1 -> 2 -> 3 -> n : false
// 1 -> 2 -> 3 -> 2 : true


function detectCycle($head): bool {
    $r = $head;
    $t = $head;
    while ($t = $t->next) {
        // $r = $r->next->next;
        if ($r->next === $t || $r === $t->next) {
            return true;
        }
    }
    return false;
}


//function detectCycle($head) {
//    $slow = $head;
//    $fast = $head;
//
//    while (!is_null($fast->next) and !is_null($fast->next->next)) {
//        $slow = $slow->next;
//        $fast = $fast->next->next;
//
//        if ($slow == $fast) return true;
//    }
//
//    return false;
//}



