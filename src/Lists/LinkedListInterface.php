<?php

namespace RossJHagan\DataStructures\Lists;

use RossJHagan\DataStructures\Core\NodeInterface;

interface LinkedListInterface
{

    /**
     * @return NodeInterface
     */
    public function getHead();

    /**
     * @return NodeInterface
     */
    public function getTail();

    public function addValueToStart($value);

    public function addToStart(NodeInterface $newStartNode);

    public function addValue($value);

    public function add(NodeInterface $newNode);

    public function removeLast();

    public function remove(NodeInterface $removeNode);

    public function enumerate();

    public function clear();

}