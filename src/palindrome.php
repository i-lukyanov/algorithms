<?php

declare(strict_types=1);

/**
 * Definition for a singly-linked list.
 */
class ListNode
{
    public int $val = 0;

    public ?ListNode $next;

    public function __construct(int $val = 0, ListNode $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Palindrome
{
    /**
     * @param ListNode $head
     * @return bool
     */
    public function isPalindrome(ListNode $head): bool
    {
        $oldNode = clone $head;
        $newNode = null;
        $curNode = null;

        $nodeValues = [$head->val];

        while ($oldNode !== null) {
            if ($oldNode->next !== null) {
                $nodeValues[] = $oldNode->next->val;
            }

            $curNode = $oldNode->next;
            $oldNode->next = $newNode;
            $newNode = $oldNode;
            $oldNode = $curNode;
        }

        $revNode = clone $newNode;
        $nodeLen = count($nodeValues);
        $cnt = 0;

        while ($revNode !== null && $cnt < $nodeLen - 1) {
            if ($nodeValues[$cnt] !== $revNode->val) {
                return false;
            }

            $revNode = $revNode->next;
            $cnt++;
        }

        return true;
    }
}

$n4 = new ListNode(5);
$n3 = new ListNode(2, $n4);
$n2 = new ListNode(2, $n3);
$n1 = new ListNode(5, $n2);

var_dump((new Palindrome())->isPalindrome($n1));
var_dump((new Palindrome())->isPalindrome($n4)); die();
