<?php

namespace RossJHagan\DataStructures\Tests\Unit\Stacks;

use RossJHagan\DataStructures\Stacks\ArrayStack;

class ArrayStackTest extends \PHPUnit_Framework_TestCase {

    /** @var ArrayStack $sut */
    protected $sut;

    public function setup()
    {
        $this->sut = new ArrayStack();
    }

    public function testPush()
    {

        $sut = $this->sut;

        $sut->push(55);

        $this->assertEquals(55, $sut->peek());

    }

    public function testPushMany()
    {

        $sut = $this->sut;

        $sut->push(55);
        $sut->push(95);
        $sut->push(1005);

        $this->assertEquals(1005, $sut->peek());

    }

    public function testPopWhenEmpty()
    {

        $sut = $this->sut;

        $popped = $sut->pop();

        $this->assertNull($popped);

    }

    public function testPop()
    {

        $sut = $this->sut;

        $sut->push(99);
        $popped = $sut->pop(99);

        $this->assertEquals(99, $popped);

    }

    public function testPeek()
    {

        $sut = $this->sut;

        $sut->push(25);

        $this->assertEquals(25, $sut->peek());

    }

    public function testClear()
    {
        $sut = $this->sut;

        $sut->push(101);
        $sut->clear();

        $this->assertNull($sut->pop());

    }

}
