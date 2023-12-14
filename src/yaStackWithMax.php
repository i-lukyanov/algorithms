<?php

declare(strict_types=1);

/*
"""
    Стек с константным поиском максимального элемента.

    push, pop, max должны работать за O(1).
"""

[100, 50, 20, 10] > 25
[1,2,3,4,5,6,7,8,9]

[1,5,3,7,2] > 10

MaxStack stack;
stack.push(2);
// max = 2, stack = [2]
stack.push(1);
// max = 2, stack = [2, 1]
stack.push(3);
// max = 3, stack = [2, 1, 3]
stack.push(3);
// max = 3, stack = [2, 1, 3, 3]
stack.pop(); // 3
// max = 3, stack = [2, 1, 3]
stack.pop(); // 3
// max = 2, stack = [2, 1]
*/

//[1,2,10,10]

class StackWithMax
{
    /**
     * @var StackElement[]
     */
    private $elements = [];

    public function push(int $elem) {
        if (count($this->elements) === 0) {
            $this->elements[] = new StackElement($elem, $elem);

            return;
        }

        $elemsLen = count($this->elements);

        $curMax = $this->elements[$elemsLen - 1]->getCurrentMax();
        if ($elem > $curMax) {
            $curMax = $elem;
        }

        $this->elements[] = new StackElement($elem, $curMax);
    }

    public function pop(): StackElement {
        $elemsLen = count($this->elements);
        $lastElem = $this->elements[$elemsLen - 1];
        unset($this->elements[$elemsLen - 1]);

        return $lastElem;
    }

    public function max(): int {
        $elemsLen = count($this->elements);

        return $this->elements[$elemsLen - 1]->getCurrentMax();
    }
}

class StackElement
{
    private $value;

    private $currentMax;

    public function __construct(int $value, int $currentMax) {
        $this->value = $value;
        $this->currentMax = $currentMax;
    }

    public function getValue(): int {
        return $this->value;
    }

    public function getCurrentMax(): int {
        return $this->currentMax;
    }
}

$stk = new StackWithMax();
$stk->push(2);
var_dump($stk->max());
$stk->push(1);
var_dump($stk->max());
$stk->push(3);
var_dump($stk->max());
$stk->push(3);
var_dump($stk->max());
$stk->push(2);
var_dump($stk->max());
$stk->pop();
var_dump($stk->max());
$stk->pop();
var_dump($stk->max());
$stk->pop();
var_dump($stk->max());
