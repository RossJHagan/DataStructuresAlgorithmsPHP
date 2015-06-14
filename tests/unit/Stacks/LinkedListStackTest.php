<?php

namespace RossJHagan\DataStructures\Tests\Unit\Stacks;


use PHPUnit_Framework_TestCase;
use RossJHagan\DataStructures\Lists\LinkedList;
use RossJHagan\DataStructures\Stacks\LinkedListStack;

class LinkedListStackTest extends PHPUnit_Framework_TestCase {

    /** @var LinkedListStack $sut */
    protected $sut;

    public function setup()
    {
        $this->sut = new LinkedListStack();
    }

    public function testItInstantiates()
    {
        $this->assertInstanceOf('RossJHagan\\DataStructures\\Stacks\\LinkedListStack', $this->sut);
    }

    public function testPush()
    {

        $linkedList = new LinkedList();

        $sut = new LinkedListStack($linkedList);

        $sut->push(105);
        $sut->push(5);

        $this->assertEquals(5, $linkedList->getHead()->getValue());
        $this->assertEquals(105, $linkedList->getTail()->getValue());

    }

    public function testPeek()
    {

        $linkedList = new LinkedList();

        $sut = new LinkedListStack($linkedList);

        $sut->push(25);
        $sut->push(5);

        $this->assertEquals(5, $sut->peek());

    }

    public function testPop()
    {

        $linkedList = new LinkedList();

        $sut = new LinkedListStack($linkedList);

        $sut->push(99);
        $sut->push(5);

        $popped = $sut->pop();

        $this->assertEquals(5, $popped);
        $this->assertEquals(99, $linkedList->getHead()->getValue());
        $this->assertEquals(99, $linkedList->getTail()->getValue());

    }

    public function testPopEmpty()
    {
        $popped = $this->sut->pop();

        $this->assertNull($popped);
    }

    public function testClear()
    {
        $sut = $this->sut;

        $sut->push(838);

        $sut->clear();

        $this->assertNull($sut->peek());
    }


}
