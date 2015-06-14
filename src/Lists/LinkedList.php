<?php

namespace RossJHagan\DataStructures\Lists;

use RossJHagan\DataStructures\Core\Node;
use RossJHagan\DataStructures\Core\NodeInterface;

class LinkedList implements LinkedListInterface
{

    /** @var NodeInterface $head */
    protected $head;

    /** @var NodeInterface $tail */
    protected $tail;

    /** @var int $count */
    protected $count;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->count = 0;
    }

    /**
     * @return NodeInterface
     */
    public function getHead()
    {
        return $this->head;
    }

    public function clearHead()
    {
        $this->head = null;
    }

    /**
     * @param NodeInterface $head
     */
    protected function setHead(NodeInterface $head)
    {
        $this->head = $head;
    }

    /**
     * @return NodeInterface
     */
    public function getTail()
    {
        return $this->tail;
    }

    public function clearTail()
    {
        $this->tail = null;
    }

    /**
     * @param NodeInterface $tail
     */
    protected function setTail(NodeInterface $tail)
    {
        $this->tail = $tail;
    }

    public function addValueToStart($value)
    {
        $node = new Node($value);
        $this->addToStart($node);
    }

    public function addToStart(NodeInterface $newStartNode)
    {

        if ( 0 === $this->count ) {

            $this->setHead($newStartNode);
            $this->setTail($newStartNode);
            $this->count++;
            return;

        }

        $oldHead = $this->head;

        $newStartNode->setNext($oldHead);

        $this->setHead($newStartNode);

        $this->count++;

    }

    public function appendList(LinkedListInterface $linkedList)
    {

        $this->getTail()->setNext($linkedList->getHead());

        $this->setTail($linkedList->getTail());

    }

    public function addValue($value)
    {

        $this->add(new Node($value));

    }

    public function add(NodeInterface $newNode)
    {

        if ( 0 === $this->count ) {

            $this->addToStart($newNode);
            return;

        } else {

            $this->tail->setNext($newNode);

        }

        $this->tail = $newNode;
        $this->count++;

    }

    public function removeFirst()
    {
        if ( 0 === $this->count ) {
            return false;
        }

        if ( 1 === $this->count ) {
            $head = $this->getHead();
            $this->clear();
            return $head;
        }

        $this->setHead($this->getHead()->getNext());
        $this->count--;

    }

    public function removeLast()
    {

        if ( 0 === $this->count ) {
            return;
        }

        if ( 1 === $this->count ) {
            $this->clearHead();
            $this->clearTail();
            $this->count--;
            return;
        }

        $current = $this->getHead();

        while ( $current->getNext() !== $this->getTail() ) {

            $current = $current->getNext();

        }

        $current->clearNext();
        $this->setTail($current);

        $this->count--;

    }

    public function remove(NodeInterface $removeNode)
    {

        if ( 0 === $this->count ) {
            return;
        }

        $node = $this->head;
        $last = $node;

        // If the head is the sought value, move the head reference to the next node and return
        if ( $node->getValue() === $removeNode->getValue() ) {

            $this->head = $node->getNext();
            return;

        }

        while ( ! is_null($node) ) {

            if ( $node->getValue() !== $removeNode->getValue() ) {
                $last = $node;
                $node = $node->getNext();
                continue;
            }

            $last->setNext($node->getNext());

            break;

        }

    }

    public function enumerate()
    {

        $current = $this->getHead();

        while ( ! is_null($current) ) {

            yield $current->getValue();

            $current = $current->getNext();

        }

    }

    public function clear()
    {
        $this->clearHead();
        $this->clearTail();
        $this->count = 0;
    }

}