<?php

declare(strict_types=1);

class A
{
    function a1() { echo "a1"; }
    function a2() { echo "a2"; }
}

class B
{
    function b1() { echo "b1"; }
    function b2() { echo "b2"; }
}

class C
{
    private A $a;

    private B $b;

    public function __construct(A $a = null, B $b = null)
    {
        $this->a = $a ?? new A();
        $this->b = $b ?? new B();
    }

    public function __call($method, $params)
    {
        if (method_exists($this->a, $method)) {
            return $this->a->$method(...$params);
        }

        if (method_exists($this->b, $method)) {
            return $this->b->$method(...$params);
        }

        throw new Error('Method does not exist');
    }
}

$c = new C();
$c->a1();
$c->a2();
$c->b1();
$c->b2();
