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

class LinkedListMid
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    public function middleNode(ListNode $head): ListNode
    {
        $curNode = clone $head;

        $nodeValues = [$head->val];

        while ($curNode !== null) {
            if ($curNode->next !== null) {
                $nodeValues[] = $curNode->next->val;
            }

            $curNode = $curNode->next;
        }

        $midKey = (int)floor(count($nodeValues) / 2);

        for ($i = 0; $i < $midKey; $i++) {
            $head = $head->next;
        }

        return $head;
    }
}

$n5 = new ListNode(0);
$n4 = new ListNode(1, $n5);
$n3 = new ListNode(2, $n4);
$n2 = new ListNode(3, $n3);
$n1 = new ListNode(5, $n2);

var_dump((new LinkedListMid())->middleNode($n1)); die();
