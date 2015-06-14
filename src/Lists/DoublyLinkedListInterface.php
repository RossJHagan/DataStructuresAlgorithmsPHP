<?php

namespace RossJHagan\DataStructures\Lists;


use RossJHagan\DataStructures\Core\DoubleNodeInterface;

interface DoublyLinkedListInterface {

    /**
     * @return DoubleNodeInterface
     */
    public function getHead();

    /**
     * @return DoubleNodeInterface
     */
    public function getTail();

    /**
     * @param DoubleNodeInterface $newStartNode
     * @return mixed
     */
    public function addToStart(DoubleNodeInterface $newStartNode);

    /**
     * @param DoubleNodeInterface $newNode
     * @return void
     */
    public function add(DoubleNodeInterface $newNode);

    /**
     * @return void
     */
    public function removeLast();

    /**
     * @param DoubleNodeInterface $removeNode
     * @return void
     */
    public function remove(DoubleNodeInterface $removeNode);

    /**
     * @return mixed
     */
    public function enumerate();

    /**
     * @return void
     */
    public function clear();

}