<?php

namespace RossJHagan\DataStructures\Queues;

use RossJHagan\DataStructures\Lists\LinkedList;
use RossJHagan\DataStructures\Lists\LinkedListInterface;

/**
 * Class LinkedListQueue
 *
 * @package RossJHagan\DataStructures\Queues
 */
class LinkedListQueue implements QueueInterface {

    /** @var LinkedListInterface $list */
    protected $list;

    /**
     * @param LinkedListInterface $linkedList
     */
    public function __construct(LinkedListInterface $linkedList = null)
    {
        if ( is_null($linkedList) ) {
            $linkedList = new LinkedList();
        }
        $this->list = $linkedList;
    }

    /**
     * @param mixed $value
     */
    public function enqueue($value)
    {

        $this->list->addValue($value);

    }

    /**
     * @return mixed
     */
    public function dequeue()
    {

        if ( null === $this->list->getHead() ) {
            return null;
        }

        $last = $this->list->getHead();
        $this->list->removeFirst();
        return $last->getValue();

    }

    /**
     * @return mixed
     */
    public function peek()
    {

        if ( null === $this->list->getHead() ) {

            return null;

        }

        return $this->list->getHead()->getValue();

    }

}