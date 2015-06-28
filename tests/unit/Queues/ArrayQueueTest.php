<?php

namespace RossJHagan\DataStructures\Tests\Unit\Queues;


use RossJHagan\DataStructures\Queues\ArrayQueue;

class ArrayQueueTest extends \PHPUnit_Framework_TestCase {

    /** @var ArrayQueue $sut */
    protected $sut;

    public function setup()
    {
        $this->sut = new ArrayQueue();
    }

    public function testItInstantiates()
    {
        $this->assertInstanceOf('RossJHagan\\DataStructures\\Queues\\ArrayQueue', $this->sut);
    }

    public function testEnqueuesFirst()
    {

        $sut = $this->sut;

        $sut->enqueue(2);

        $this->assertEquals(2, $sut->peek());

    }

    public function testEnqueuesThree()
    {

        $sut = $this->sut;

        $sut->enqueue(2);
        $sut->enqueue(4);
        $sut->enqueue(6);

        $this->assertEquals(2, $sut->peek());

    }

    public function testEnqueuesSixOutOfOrder()
    {

        $sut = $this->sut;

        $sut->enqueue(1);
        $sut->enqueue(2);
        $sut->enqueue(3);
        $sut->enqueue(4);

        $sut->dequeue(); // Throw away 1;

        $this->assertEquals(4, $sut->count(), "Counter");

        $sut->enqueue(5);

        $this->assertEquals(4, $sut->count());

        // Check the queue's head is at 2
        $this->assertEquals(2, $sut->peek());

        $sut->dequeue(); // Throw away 2;

        $this->assertEquals(3, $sut->peek());

        $sut->enqueue(6);
        $sut->enqueue(7);
        $sut->enqueue(8);
        $sut->enqueue(9);

        // Our head should still be at 3
        $this->assertEquals(3, $sut->peek());

    }

    public function testEnqueuesSixInOrder()
    {

        $sut = $this->sut;

        $sut->enqueue(1);
        $sut->enqueue(2);
        $sut->enqueue(3);
        $sut->enqueue(4);
        $sut->enqueue(5);
        $sut->enqueue(6);

        // Length should have grown to 8 (initialised to 4 on first queue, doubled to 8 when adding 5)
        $this->assertEquals(8, $sut->count());
        $this->assertEquals(1, $sut->peek());

    }

    public function testDequeueMany()
    {
        $sut = $this->sut;

        $sut->enqueue(1);
        $sut->enqueue(2);
        $sut->enqueue(3);
        $sut->enqueue(4);

        $sut->dequeue();
        $sut->dequeue();
        $sut->dequeue();

        $this->assertEquals(4, $sut->peek());

        $sut->enqueue(4);
        $sut->dequeue();

        $this->assertEquals(4, $sut->peek());

    }

    public function testPeekEmpty()
    {

        $sut = $this->sut;

        $this->assertNull($sut->peek());

    }

    public function testPeek()
    {
        $sut = $this->sut;

        $sut->enqueue(21);
        $sut->enqueue(22);
        $sut->enqueue(23);

        $this->assertEquals(21, $sut->peek());

    }

    public function testEmptyDequeue()
    {
        $this->assertNull($this->sut->dequeue());
    }

    public function testDequeue()
    {

        $sut = $this->sut;

        $sut->enqueue(21);
        $sut->enqueue(22);

        $first = $sut->dequeue();
        $this->assertEquals(21, $first);
        $second = $sut->dequeue();
        $this->assertEquals(22, $second);

    }

    public function testRequeue()
    {

        $sut = $this->sut;

        $sut->enqueue(21);
        $sut->enqueue(22);

        // 21 out
        $discard = $sut->dequeue();

        $sut->enqueue(23);
        $sut->enqueue(24);

        // 22 out
        $discard = $sut->dequeue();

        $this->assertEquals(23, $sut->dequeue());


    }


}
