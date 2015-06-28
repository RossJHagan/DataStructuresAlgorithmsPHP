<?php

namespace RossJHagan\DataStructures\Queues;


use Countable;

class ArrayQueue implements QueueInterface, Countable {

    protected $queue;

    protected $head;

    protected $tail;

    protected $size;

    public function __construct()
    {

        $this->queue = new \SplFixedArray(0);
        $this->head = 0;
        $this->tail = -1;
        $this->head = 0;
        $this->size = 0;

    }

    /**
     * enqueue adds a new value to the queue
     *
     * Attribution: [Pluralsight's Algorithms and Data Structures by Robert Horvick](http://www.pluralsight.com/courses/ads-part1)
     *
     * This implementation is more or less a direct PHP equivalent implementation of Robert Horvick's.  I've added some
     * explanatory comments for my and others' understanding.
     *
     * @param $value
     */
    public function enqueue($value)
    {

        if ( $this->queue->count() === $this->size ) {

            // Our initialized size is 0, so if there are no items added we start with an initial size of four
            // and otherwise we keep doubling our array size
            $newLength = $this->size === 0 ? 4 : $this->size * 2;

            $newStore = new \SplFixedArray($newLength);

            // Remember here that the size check is against the number of queued items, not the array length
            if ( $this->size > 0 ) {

                $targetIndex = 0;

                // If the tail index is less than the head index, then our array might look something like this
                //
                // T     H
                // 4  5  1  2  3
                //
                // So when we move the items to the new size of array, we need to loop:
                //
                // Head > (Array End)
                // Tail > (Head - 1)
                if ( $this->tail < $this->head ) {

                    // Run from the start (Head) to the end of the array and copy into the new store
                    for ( $i = $this->head; $i < $this->queue->count(); $i++ ) {

                        $newStore[$targetIndex] = $this->queue[$i];
                        $targetIndex++;

                    }

                    // Run from the tail to the head - 1
                    for ( $i = 0; $i <= $this->tail; $i++ ) {

                        $newStore[$targetIndex] = $this->queue[$i];
                        $targetIndex++;

                    }

                } else {

                    // Our Head and Tail indices are in the right order, so a straight copy will do the trick
                    for ( $i = $this->head; $i <= $this->tail; $i++ ) {
                        $newStore[$targetIndex] = $this->queue[$i];
                        $targetIndex++;
                    }

                }

                // Our new array is in place, so we need to reset and set the tail to be at the index of the
                // last item in the new array, which has been tracked in all of our loops
                $this->head = 0;
                $this->tail = $targetIndex - 1;

            } else {

                // There are no items, so we can just reset the head and tail to their default values
                $this->head = 0;
                $this->tail = -1;

            }

            // Our shiny newly grown array is ready to be used, assign it!
            $this->queue = $newStore;

        }

        if ( $this->tail === ( $this->queue->count() - 1 ) ) {

            $this->tail = 0;

        } else {

            $this->tail++;

        }

        $this->queue[$this->tail] = $value;

        $this->size++;

    }

    public function dequeue()
    {

        if ( 0 === $this->size ) {
            return null;
        }

        $val = $this->queue[$this->head];

        if ( $this->head === ($this->queue->count() - 1) ) {

            $this->head = 0;

        } else {

            $this->head++;

        }

        $this->size--;

        return $val;

    }

    public function peek()
    {

        if ( 0 === $this->size ) {
            return null;
        }

        return $this->queue[$this->head];

    }

    public function count()
    {
        return $this->queue->count();
    }

}