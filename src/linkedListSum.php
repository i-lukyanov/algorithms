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

class LinkedListSum
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
    {
        $first = (string)$l1->val;
        $second = (string)$l2->val;

        foreach ($this->getLinkedListNext($l1) as $firstNext) {
            $first .= $firstNext->val;
        }

        foreach ($this->getLinkedListNext($l2) as $secondNext) {
            $second .= $secondNext->val;
        }

        $sum = $this->addLargeNumbers(strrev($first), strrev($second));

        return $this->createLinkedListFromNum($sum);
    }

    private function getLinkedListNext(ListNode $ln): iterable
    {
        $curNode = clone $ln;

        while ($curNode->next !== null) {
            yield $curNode->next;

            $curNode = $curNode->next;
        }
    }

    private function addLargeNumbers(string $num1, string $num2): string
    {
        $result = '';
        $inMind = 0;
        $maxLength = max(strlen($num1), strlen($num2));

        $num1 = str_pad($num1, $maxLength, '0', STR_PAD_LEFT);
        $num2 = str_pad($num2, $maxLength, '0', STR_PAD_LEFT);

        for ($i = $maxLength - 1; $i >= 0; $i--) {
            $x1 = (int)$num1[$i];
            $x2 = (int)$num2[$i];

            $sum = $x1 + $x2 + $inMind;

            $inMind = 0;
            if ($sum > 9) {
                $inMind = 1;
                $sum %= 10;
            }

            $result = $sum . $result;
        }

        if ($inMind > 0) {
            $result = $inMind . $result;
        }

        return $result;
    }

    private function createLinkedListFromNum(string $num): ListNode
    {
        $numArr = str_split($num);
        $numLen = count($numArr);

        $tailNode = new ListNode((int)$numArr[0]);
        $curNode = clone $tailNode;
        $prevNode = $curNode;

        for ($i = 1; $i < $numLen; $i++) {
            $prevNode = new ListNode((int)$numArr[$i], $curNode);
            $curNode = $prevNode;
        }

        return $prevNode;
    }
}

$m3 = new ListNode(9);
$m2 = new ListNode(4, $m3);
$m1 = new ListNode(2, $m2);

$n4 = new ListNode(9);
$n3 = new ListNode(4, $n4);
$n2 = new ListNode(6, $n3);
$n1 = new ListNode(5, $n2);

var_dump((new LinkedListSum())->addTwoNumbers($m1, $n1)); die();
