<?php

namespace RossJHagan\DataStructures\Tests\Unit\Core;

use PHPUnit_Framework_TestCase;
use RossJHagan\DataStructures\Core\DoubleNode;
use RossJHagan\DataStructures\Core\Node;

class DoubleNodeTest extends PHPUnit_Framework_TestCase {

    /** @var Node $sut */
    protected $sut;

    public function setup()
    {
        $this->sut = new DoubleNode(5);
    }

    public function testItInstantiates()
    {
        $sut = $this->sut;

        $this->assertInstanceOf('RossJHagan\\DataStructures\\Core\\DoubleNode', $sut);
    }

    public function testImplementsNodeInterface()
    {
        $this->assertInstanceOf('RossJHagan\\DataStructures\\Core\\DoubleNodeInterface', $this->sut);
    }

    public function testGetPrev()
    {
        $sut = new DoubleNode(10, new DoubleNode(9), new DoubleNode(10));

        $this->assertEquals(9, $sut->getPrev()->getValue());
    }

    public function testSetPrev()
    {

        $sut = new DoubleNode(10);
        $prev = new DoubleNode(9);

        $sut->setPrev($prev);

        $this->assertEquals(9, $sut->getPrev()->getValue());

    }

    public function testClearPrev()
    {
        $sut = $this->sut;

        $sut->setPrev(new DoubleNode(25));

        $this->assertEquals(25, $sut->getPrev()->getValue());

        $sut->clearPrev();

        $this->assertNull($sut->getPrev());

    }

    public function testClearNext()
    {
        $sut = $this->sut;

        $sut->setNext(new DoubleNode(5));

        $this->assertEquals(5, $sut->getNext()->getValue());

        $sut->clearNext();

        $this->assertNull($sut->getNext());

    }

    public function testGetNext()
    {

        $prev = new DoubleNode(5);

        $sut = new DoubleNode(55, $prev);

        $this->assertNull($sut->getNext());

    }

    public function testSetNext()
    {

        $sut = $this->sut;

        $next = new DoubleNode(999);

        $sut->setNext($next);

        $this->assertEquals(999, $sut->getNext()->getValue());

    }

    public function testGetValue()
    {

        $sut = new DoubleNode(5);

        $this->assertEquals(5, $sut->getValue());

    }

    public function testSetValue()
    {
        $sut = $this->sut;

        $sut->setValue(1000);

        $this->assertEquals(1000, $sut->getValue());
    }

}
