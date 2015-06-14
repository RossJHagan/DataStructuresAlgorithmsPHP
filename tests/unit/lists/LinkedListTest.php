<?php

namespace RossJHagan\DataStructures\Tests\Unit\Lists;

use PHPUnit_Framework_TestCase;
use RossJHagan\DataStructures\Core\Node;
use RossJHagan\DataStructures\Lists\LinkedList;

class LinkedListTest extends PHPUnit_Framework_TestCase {

    /** @var LinkedList $sut */
    protected $sut;

    public function setup()
    {
        $this->sut = new LinkedList();
    }

    public function testItInstantiates()
    {

        $this->assertInstanceOf('RossJHagan\\DataStructures\\Lists\\LinkedList', $this->sut);

    }

    public function testClearHead()
    {
        $sut = $this->sut;

        $sut->add(new Node(5));

        $sut->clearHead();

        $this->assertNull($sut->getHead());

    }

    public function testClearTail()
    {
        $sut = $this->sut;

        $sut->add(new Node(5));

        $sut->clearTail();

        $this->assertNull($sut->getTail());

    }

    public function testAddValueToStart()
    {
        $sut = $this->sut;

        $sut->addValueToStart(55);

        $this->assertEquals(55, $sut->getHead()->getValue());
    }

    public function testAddToStartWhenListEmpty()
    {

        $sut = $this->sut;

        $newNode = new Node(5);

        $sut->addToStart($newNode);

        $this->assertEquals(spl_object_hash($newNode), spl_object_hash($sut->getHead()));
        $this->assertEquals(5, $sut->getHead()->getValue());

    }

    public function testAddToStartWhenListNotEmpty()
    {
        $sut = $this->sut;

        $firstNode  = new Node(5);
        $secondNode = new Node(20);

        $sut->addToStart($firstNode);
        $sut->addToStart($secondNode);

        $this->assertEquals(spl_object_hash($secondNode), spl_object_hash($sut->getHead()));
        $this->assertEquals(20, $sut->getHead()->getValue());

    }

    public function testAddFirstNode()
    {

        $sut = $this->sut;

        $newNode = new Node(1);

        $sut->add($newNode);

        $this->assertEquals(spl_object_hash($newNode), spl_object_hash($sut->getHead()));
        $this->assertEquals(spl_object_hash($newNode), spl_object_hash($sut->getTail()));

    }

    public function testAddSecondNode()
    {

        $sut = $this->sut;

        $firstNode = new Node(10);
        $secondNode = new Node(20);

        $sut->add($firstNode);
        $sut->add($secondNode);

        $this->assertEquals(10, $sut->getHead()->getValue());
        $this->assertEquals(20, $sut->getTail()->getValue());

    }

    public function testAddValue()
    {

        $sut = $this->sut;

        $sut->addValue(25);
        $sut->addValue(35);
        $sut->addValue(45);

        $this->assertEquals(45, $sut->getTail()->getValue());

    }

    public function testRemoveLastWithNoItems()
    {

        $sut = $this->sut;

        $sut->removeLast();

        $this->assertNull($sut->getHead());
        $this->assertNull($sut->getTail());

    }

    public function testRemoveFirstWhenEmpty()
    {

        $sut = $this->sut;

        $sut->removeFirst();

        $this->assertNull($sut->getHead());
        $this->assertNull($sut->getTail());

    }

    public function testRemoveFirstWithOneItem()
    {

        $sut = $this->sut;

        $firstNode = new Node(10);

        $sut->add($firstNode);

        $sut->removeFirst();

        $this->assertNull($sut->getHead());
        $this->assertNull($sut->getTail());

    }

    public function testRemoveFirstWithTwoItems()
    {

        $sut = $this->sut;

        $firstNode  = new Node(10);
        $secondNode = new Node(20);

        $sut->add($firstNode);
        $sut->add($secondNode);

        $sut->removeFirst();

        $this->assertEquals(20, $sut->getHead()->getValue());
        $this->assertEquals(20, $sut->getTail()->getValue());
        $this->assertNull($sut->getTail()->getNext());

    }

    public function testRemoveFirstWithThreeItems()
    {

        $sut = $this->sut;

        $firstNode  = new Node(10);
        $secondNode = new Node(20);
        $thirdNode = new Node(30);

        $sut->add($firstNode);
        $sut->add($secondNode);
        $sut->add($thirdNode);

        $sut->removeFirst();

        $this->assertEquals(20, $sut->getHead()->getValue());
        $this->assertEquals(30, $sut->getTail()->getValue());
        $this->assertNull($sut->getTail()->getNext());

    }

    public function testRemoveLastWithOneItem()
    {

        $sut = $this->sut;

        $firstNode = new Node(10);

        $sut->add($firstNode);

        $sut->removeLast();

        $this->assertNull($sut->getHead());
        $this->assertNull($sut->getTail());

    }

    public function testRemoveLastWithTwoItems()
    {

        $sut = $this->sut;

        $firstNode  = new Node(10);
        $secondNode = new Node(20);

        $sut->add($firstNode);
        $sut->add($secondNode);

        $sut->removeLast();

        $this->assertEquals(10, $sut->getHead()->getValue());
        $this->assertEquals(10, $sut->getTail()->getValue());
        $this->assertNull($sut->getTail()->getNext());

    }

    public function testRemoveLastWithThreeItems()
    {

        $sut = $this->sut;

        $firstNode  = new Node(10);
        $secondNode = new Node(20);
        $thirdNode = new Node(30);

        $sut->add($firstNode);
        $sut->add($secondNode);
        $sut->add($thirdNode);

        $sut->removeLast();

        $this->assertEquals(10, $sut->getHead()->getValue());
        $this->assertEquals(20, $sut->getTail()->getValue());
        $this->assertNull($sut->getTail()->getNext());

    }

    public function testRemoveWhenEmpty()
    {
        $sut = $this->sut;

        $sut->remove(new Node(55));

        $this->assertNull($sut->getHead());
        $this->assertNull($sut->getTail());

    }

    public function testRemove()
    {

        $sut = $this->sut;

        $firstNode  = new Node(10);
        $secondNode = new Node(20);
        $thirdNode  = new Node(30);
        $fourthNode = new Node(40);

        $sut->add($firstNode);
        $sut->add($secondNode);
        $sut->add($thirdNode);
        $sut->add($fourthNode);

        $sut->remove($thirdNode);

        $this->assertEquals([10,20,40], iterator_to_array($sut->enumerate()));
        $this->assertEquals(40, $sut->getTail()->getValue());
        $this->assertEquals(10, $sut->getHead()->getValue());
        $this->assertNull($sut->getTail()->getNext());

        $sut->remove($firstNode);
        $this->assertEquals([20,40], iterator_to_array($sut->enumerate()));
        $this->assertEquals(20, $sut->getHead()->getValue());
        $this->assertEquals(40, $sut->getTail()->getValue());
        $this->assertNull($sut->getTail()->getNext());

    }

    public function testEnumerate()
    {
        $sut = $this->sut;

        $firstNode  = new Node(10);
        $secondNode = new Node(20);

        $sut->add($firstNode);
        $sut->add($secondNode);

        $out = iterator_to_array($sut->enumerate());

        $this->assertEquals(array(10, 20), $out);

    }


    public function testClear()
    {

        $sut = $this->sut;

        $sut->add(new Node(5));

        $this->assertEquals(5, $sut->getHead()->getValue());
        $this->assertEquals(5, $sut->getTail()->getValue());

        $sut->clear();

        $this->assertNull($sut->getTail());
        $this->assertNull($sut->getHead());

    }

    public function testAppendList()
    {

        $sut = $this->sut;
        $sut->add(new Node(1000));
        $sut->add(new Node(1001));

        $otherList = new LinkedList();
        $otherList->add(new Node(10));
        $otherList->add(new Node(20));

        $sut->appendList($otherList);

        $this->assertEquals(1000, $sut->getHead()->getValue());
        $this->assertEquals(20, $sut->getTail()->getValue());

        $this->assertEquals(10, $otherList->getHead()->getValue());
        $this->assertEquals(20, $otherList->getTail()->getValue());

    }

}
