<?php

namespace RossJHagan\DataStructures\Lists;


use RossJHagan\DataStructures\Core\DoubleNodeInterface;

class DoublyLinkedList implements DoublyLinkedListInterface {

    protected $head;

    protected $tail;

    protected $count;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->count = 0;
    }

    /**
     * @return DoubleNodeInterface
     */
    public function getHead()
    {
        return $this->head;
    }

    protected function setHead(DoubleNodeInterface $node)
    {
        $this->head = $node;
    }

    public function clearHead()
    {
        $this->head = null;
    }

    /**
     * @return DoubleNodeInterface
     */
    public function getTail()
    {
        return $this->tail;
    }

    protected function setTail(DoubleNodeInterface $node)
    {
        $this->tail = $node;
    }

    public function clearTail()
    {
        $this->tail = null;
    }

    /**
     * @param DoubleNodeInterface $newStartNode
     * @return mixed
     */
    public function addToStart(DoubleNodeInterface $newStartNode)
    {

        if ( 0 === $this->count ) {

            $this->setHead($newStartNode);
            $this->setTail($newStartNode);
            $this->count++;
            return;

        }

        $currentHead = $this->getHead();

        $newStartNode->setNext($currentHead);
        $currentHead->setPrev($newStartNode);

        $this->setHead($newStartNode);
        $this->count++;

    }

    /**
     * @param DoubleNodeInterface $newNode
     * @return void
     */
    public function add(DoubleNodeInterface $newNode)
    {

        if ( 0 === $this->count ) {
            $this->addToStart($newNode);
            return;
        }

        $newNode->setPrev($this->getTail());
        $this->getTail()->setNext($newNode);
        $this->setTail($newNode);

        $this->count++;

    }

    /**
     * @return void
     */
    public function removeLast()
    {

        if ( 0 === $this->count ) {
            return;
        }

        if ( 1 === $this->count ) {
            $this->clearHead();
            $this->clearTail();
            $this->count = 0;
            return;
        }

        $currentTail = $this->getTail();

        $lastButOne = $currentTail->getPrev();
        $lastButOne->clearNext();

        $this->setTail($lastButOne);

        $this->count--;

    }

    /**
     * @param DoubleNodeInterface $removeNode
     * @return void
     */
    public function remove(DoubleNodeInterface $removeNode)
    {
        if ( 0 === $this->count ) {
            return false;
        }

        if ( 1 === $this->count && $removeNode->getValue() !== $this->getHead()->getValue() ) {
            return false;
        }

        $current = $this->getHead();

        while ( !is_null($current) && $current->getValue() !== $removeNode->getValue() ) {
            $current = $current->getNext();
        }

        if ( is_null($current) ) {
            return false;
        }

        $prev = $current->getPrev();
        $next = $current->getNext();

        // If the current value is in the middle of the list
        // It should set the current's prev to current's next
        // It should set the current's next to current's prev
        if ( !is_null($prev) && !is_null($next) ) {
            $next->setPrev($prev);
            $prev->setNext($next);
        }

        // If the current value is the start of the list
        // Set next's previous to null
        // Set head to next
        // Set current's next to null
        if ( $this->getHead() === $current ) {
            $next->clearPrev();
            $this->setHead($next);
        }

        // If the current value is the end of the list
        // Set the previous' next to null
        // Set the current's previous to null
        if ( $this->getTail() === $current ) {
            $prev->clearNext();
            $this->setTail($prev);
        }

        $current->clearNext();
        $current->clearPrev();

        $this->count--;

    }

    /**
     * @return mixed
     */
    public function enumerate()
    {

        $current = $this->getHead();

        while ( ! is_null($current) ) {

            yield $current->getValue();
            $current = $current->getNext();

        }

    }

    /**
     * @return void
     */
    public function clear()
    {
        $this->clearHead();
        $this->clearTail();
        $this->count = 0;
    }
}