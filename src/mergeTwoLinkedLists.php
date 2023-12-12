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

class Solution
{
    function mergeTwoLists(?ListNode $list1, ?ListNode $list2): ?ListNode
    {
        if ($list1 === null && $list2 === null) {
            return null;
        }

        $a1 = $a2 = [];

        if ($list1 !== null) {
            $a1[] = $list1->val;

            foreach ($this->getLinkedListNext($list1) as $next1) {
                $a1[] = $next1->val;
            }
        }

        if ($list2 !== null) {
            $a2[] = $list2->val;

            foreach ($this->getLinkedListNext($list2) as $next2) {
                $a2[] = $next2->val;
            }
        }

        $resultArray = $this->mergeSortedArrays($a1, $a2);

        return $this->createLinkedListFromArray($resultArray);
    }

    private function getLinkedListNext(ListNode $ln): iterable
    {
        $curNode = clone $ln;

        while ($curNode->next !== null) {
            yield $curNode->next;

            $curNode = $curNode->next;
        }
    }

    private function mergeSortedArrays(array $arr1, array $arr2): array
    {
        $arrLen1 = count($arr1);
        $arrLen2 = count($arr2);
        $maxLen = max($arrLen1, $arrLen2);

        $cnt1 = $cnt2 = 0;
        $arr = [];
        while ($cnt1 < $maxLen && $cnt2 < $maxLen) {
            if ($cnt1 >= $arrLen1 && $cnt2 < $arrLen2) {
                $arr[$arr2[$cnt2]][] = $arr2[$cnt2];
                $cnt2++;
                continue;
            }

            if ($cnt2 >= $arrLen2 && $cnt1 < $arrLen1) {
                $arr[$arr1[$cnt1]][] = $arr1[$cnt1];
                $cnt1++;
                continue;
            }

            if ($arr1[$cnt1] <= $arr2[$cnt2]) {
                $arr[$arr1[$cnt1]][] = $arr1[$cnt1];
                $arr[$arr2[$cnt2]][] = $arr2[$cnt2];
            } else {
                $arr[$arr2[$cnt2]][] = $arr2[$cnt2];
                $arr[$arr1[$cnt1]][] = $arr1[$cnt1];
            }

            $cnt1++;
            $cnt2++;
        }

        $result = [];
        ksort($arr, SORT_NUMERIC);
        foreach ($arr as $item) {
            $result = array_merge($result, $item);
        }

        return $result;
    }

    private function createLinkedListFromArray(array $num): ListNode
    {
        $numLen = count($num);

        $tailNode = new ListNode($num[$numLen-1]);
        $curNode = clone $tailNode;
        $prevNode = $curNode;

        for ($i = $numLen-2; $i >= 0; $i--) {
            $prevNode = new ListNode($num[$i], $curNode);
            $curNode = $prevNode;
        }

        return $prevNode;
    }
}

//$m3 = new ListNode(9);
//$m2 = new ListNode(4, $m3);
$m1 = new ListNode(-5);

$n5 = new ListNode(9);
$n4 = new ListNode(9, $n5);
$n3 = new ListNode(0, $n4);
$n2 = new ListNode(-7, $n3);
$n1 = new ListNode(-10, $n2);

var_dump((new Solution())->mergeTwoLists($m1, $n1)); die();
