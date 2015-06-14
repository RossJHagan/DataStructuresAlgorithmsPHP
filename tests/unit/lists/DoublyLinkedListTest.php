<?php

namespace RossJHagan\DataStructures\Tests\Unit\Lists;

use PHPUnit_Framework_TestCase;
use RossJHagan\DataStructures\Core\DoubleNode;
use RossJHagan\DataStructures\Lists\DoublyLinkedList;

class DoublyLinkedListTest extends PHPUnit_Framework_TestCase {

    /** @var DoublyLinkedList $sut */
    protected $sut;

    public function setup()
    {
        $this->sut = new DoublyLinkedList();
    }

    public function testItInstantiates()
    {

        $this->assertInstanceOf('RossJHagan\\DataStructures\\Lists\\DoublyLinkedList', $this->sut);

    }

    public function testClearHead()
    {
        $sut = $this->sut;

        $sut->add(new DoubleNode(5));

        $sut->clearHead();

        $this->assertNull($sut->getHead());

    }

    public function testClearTail()
    {
        $sut = $this->sut;

        $sut->add(new DoubleNode(5));

        $sut->clearTail();

        $this->assertNull($sut->getTail());

    }

    public function testAddToStartWhenListEmpty()
    {

        $sut = $this->sut;

        $newNode = new DoubleNode(5);

        $sut->addToStart($newNode);

        $this->assertEquals(spl_object_hash($newNode), spl_object_hash($sut->getHead()));
        $this->assertEquals(5, $sut->getHead()->getValue());

    }

    public function testAddToStartWhenListNotEmpty()
    {
        $sut = $this->sut;

        $firstNode  = new DoubleNode(5);
        $secondNode = new DoubleNode(20);

        $sut->addToStart($firstNode);
        $sut->addToStart($secondNode);

        $this->assertEquals(spl_object_hash($secondNode), spl_object_hash($sut->getHead()));
        $this->assertEquals(20, $sut->getHead()->getValue());

    }

    public function testAddFirstNode()
    {

        $sut = $this->sut;

        $newNode = new DoubleNode(1);

        $sut->add($newNode);

        $this->assertEquals(spl_object_hash($newNode), spl_object_hash($sut->getHead()));
        $this->assertEquals(spl_object_hash($newNode), spl_object_hash($sut->getTail()));

    }

    public function testAddSecondNode()
    {

        $sut = $this->sut;

        $firstNode = new DoubleNode(10);
        $secondNode = new DoubleNode(20);

        $sut->add($firstNode);
        $sut->add($secondNode);

        $this->assertEquals(10, $sut->getHead()->getValue());
        $this->assertEquals(20, $sut->getTail()->getValue());

    }

    public function testRemoveLastWithNoItems()
    {

        $sut = $this->sut;

        $sut->removeLast();

        $this->assertNull($sut->getHead());
        $this->assertNull($sut->getTail());

    }

    public function testRemoveLastWithOneItem()
    {

        $sut = $this->sut;

        $firstNode = new DoubleNode(10);

        $sut->add($firstNode);

        $sut->removeLast();

        $this->assertNull($sut->getHead());
        $this->assertNull($sut->getTail());

    }

    public function testRemoveLastWithTwoItems()
    {

        $sut = $this->sut;

        $firstNode  = new DoubleNode(10);
        $secondNode = new DoubleNode(20);

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

        $firstNode  = new DoubleNode(10);
        $secondNode = new DoubleNode(20);
        $thirdNode = new DoubleNode(30);

        $sut->add($firstNode);
        $sut->add($secondNode);
        $sut->add($thirdNode);

        $sut->removeLast();

        $this->assertEquals(10, $sut->getHead()->getValue());
        $this->assertEquals(20, $sut->getTail()->getValue());
        $this->assertNull($sut->getTail()->getNext());

    }

    public function testRemoveWhenItemNotInListAndOneLength()
    {

        $sut = $this->sut;

        $firstNode  = new DoubleNode(10);
        $sut->add($firstNode);

        $mysteryNode = new DoubleNode(1010);
        $sut->remove($mysteryNode);

        $this->assertEquals(10, $sut->getHead()->getValue());
        $this->assertEquals(10, $sut->getTail()->getValue());
        $this->assertNull($sut->getTail()->getNext());

    }

    public function testRemoveWhenItemNotInList()
    {

        $sut = $this->sut;

        $firstNode  = new DoubleNode(10);
        $secondNode = new DoubleNode(20);
        $thirdNode = new DoubleNode(30);

        $mysteryNode = new DoubleNode(1010);

        $sut->add($firstNode);
        $sut->add($secondNode);
        $sut->add($thirdNode);

        $sut->remove($mysteryNode);

        $this->assertEquals(10, $sut->getHead()->getValue());
        $this->assertEquals(30, $sut->getTail()->getValue());
        $this->assertNull($sut->getTail()->getNext());

    }

    public function testRemoveWhenEmpty()
    {
        $sut = $this->sut;

        $sut->remove(new DoubleNode(55));

        $this->assertNull($sut->getHead());
        $this->assertNull($sut->getTail());

    }

    public function testRemove()
    {

        $sut = $this->sut;

        $firstNode  = new DoubleNode(10);
        $secondNode = new DoubleNode(20);
        $thirdNode  = new DoubleNode(30);
        $fourthNode = new DoubleNode(40);

        $sut->add($firstNode);
        $sut->add($secondNode);
        $sut->add($thirdNode);
        $sut->add($fourthNode);

        $sut->remove($thirdNode);

        $this->assertEquals([10,20,40], iterator_to_array($sut->enumerate()));

        $this->assertEquals($secondNode->getNext(), $fourthNode);
        $this->assertEquals($fourthNode->getPrev(), $secondNode);

        $this->assertEquals(40, $sut->getTail()->getValue());
        $this->assertEquals(10, $sut->getHead()->getValue());
        $this->assertNull($sut->getTail()->getNext());

        $sut->remove($firstNode);

        $this->assertNull($secondNode->getPrev());
        $this->assertEquals($secondNode->getNext(), $fourthNode);
        $this->assertEquals($fourthNode->getPrev(), $secondNode);

        $this->assertEquals([20,40], iterator_to_array($sut->enumerate()));
        $this->assertEquals(20, $sut->getHead()->getValue());
        $this->assertEquals(40, $sut->getTail()->getValue());
        $this->assertNull($sut->getTail()->getNext());

    }

    public function testRemoveForLastNode()
    {
        $sut = $this->sut;

        $firstNode  = new DoubleNode(10);
        $secondNode = new DoubleNode(20);

        $sut->add($firstNode);
        $sut->add($secondNode);

        $sut->remove($secondNode);

        $this->assertEquals(10, $sut->getTail()->getValue());
        $this->assertNull($sut->getTail()->getNext());
        $this->assertEquals(10, $sut->getHead()->getValue());
        $this->assertNull($sut->getHead()->getNext());

    }

    public function testEnumerate()
    {
        $sut = $this->sut;

        $firstNode  = new DoubleNode(10);
        $secondNode = new DoubleNode(20);

        $sut->add($firstNode);
        $sut->add($secondNode);

        $out = iterator_to_array($sut->enumerate());

        $this->assertEquals(array(10, 20), $out);

    }


    public function testClear()
    {

        $sut = $this->sut;

        $sut->add(new DoubleNode(5));

        $this->assertEquals(5, $sut->getHead()->getValue());
        $this->assertEquals(5, $sut->getTail()->getValue());

        $sut->clear();

        $this->assertNull($sut->getTail());
        $this->assertNull($sut->getHead());

    }

//    public function testAppendList()
//    {
//
//        $sut = $this->sut;
//        $sut->add(new DoubleNode(1000));
//        $sut->add(new DoubleNode(1001));
//
//        $otherList = new DoublyLinkedList();
//        $otherList->add(new DoubleNode(10));
//        $otherList->add(new DoubleNode(20));
//
//        $sut->appendList($otherList);
//
//        $this->assertEquals(1000, $sut->getHead()->getValue());
//        $this->assertEquals(20, $sut->getTail()->getValue());
//
//        $this->assertEquals(10, $otherList->getHead()->getValue());
//        $this->assertEquals(20, $otherList->getTail()->getValue());
//
//    }

}
