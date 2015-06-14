<?php

namespace RossJHagan\DataStructures\Tests\Unit\Queues;


use RossJHagan\DataStructures\Lists\LinkedList;
use RossJHagan\DataStructures\Queues\LinkedListQueue;

class LinkedListQueueTest extends \PHPUnit_Framework_TestCase {

    /** @var LinkedListQueue $sut */
    protected $sut;

    public function setup()
    {
        $this->sut = new LinkedListQueue();
    }

    public function testItInstantiates()
    {
        $this->assertInstanceOf('RossJHagan\\DataStructures\\Queues\\LinkedListQueue', $this->sut);
    }

    public function testEnqueues()
    {

        $list = new LinkedList();
        $sut = new LinkedListQueue($list);

        $sut->enqueue(909);
        $sut->enqueue(919);
        $sut->enqueue(929);

        $this->assertEquals(909, $list->getHead()->getValue());

        $list = new LinkedListQueue();

    }

    public function testDequeues()
    {

        $list = new LinkedList();
        $sut = new LinkedListQueue($list);

        $sut->enqueue(900);
        $sut->enqueue(901);
        $sut->enqueue(902);

        $value = $sut->dequeue();

        $this->assertEquals(900, $value);

        $sut = new LinkedListQueue();

        $value = $sut->dequeue();

        $this->assertNull($value);

    }

    public function testPeek()
    {
        $sut = $this->sut;

        $sut->enqueue(1919);
        $sut->enqueue(1929);
        $sut->enqueue(1939);

        $this->assertEquals(1919, $sut->peek());

    }

    public function testEmptyPeek()
    {

        $sut = $this->sut;

        $this->assertNull($sut->peek());

    }

}
