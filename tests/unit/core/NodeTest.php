<?php

namespace RossJHagan\DataStructures\Tests\Unit\Core;

use PHPUnit_Framework_TestCase;
use RossJHagan\DataStructures\Core\Node;

class NodeTest extends PHPUnit_Framework_TestCase {

    /** @var Node $sut */
    protected $sut;

    public function setup()
    {
        $this->sut = new Node(5);
    }

    public function testItInstantiates()
    {
        $sut = $this->sut;

        $this->assertInstanceOf('RossJHagan\\DataStructures\\Core\\Node', $sut);
    }

    public function testImplementsNodeInterface()
    {
        $this->assertInstanceOf('RossJHagan\\DataStructures\\Core\\NodeInterface', $this->sut);
    }

    public function testClearNext()
    {

        $sut = $this->sut;

        $sut->setNext(new Node(15));

        $sut->clearNext();

        $this->assertNull($sut->getNext());

    }

    public function testGetNext()
    {

        $next = new Node(5);

        $sut = new Node(55, $next);

        $this->assertInstanceOf('RossJHagan\\DataStructures\\Core\\NodeInterface', $sut->getNext());

    }

    public function testSetNext()
    {

        $sut = $this->sut;

        $next = new Node(999);

        $sut->setNext($next);

        $this->assertEquals(999, $sut->getNext()->getValue());

    }

    public function testGetValue()
    {

        $sut = new Node(5);

        $this->assertEquals(5, $sut->getValue());

    }

    public function testSetValue()
    {
        $sut = $this->sut;

        $sut->setValue(1000);

        $this->assertEquals(1000, $sut->getValue());
    }

}