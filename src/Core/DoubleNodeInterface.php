<?php

namespace RossJHagan\DataStructures\Core;

interface DoubleNodeInterface {

    /**
     * @return DoubleNodeInterface
     */
    public function getPrev();

    /**
     * @param DoubleNodeInterface $node
     * @return void
     */
    public function setPrev(DoubleNodeInterface $node);

    /**
     * @return DoubleNodeInterface
     */
    public function getNext();

    /**
     * @param DoubleNodeInterface $next
     * @return void
     */
    public function setNext(DoubleNodeInterface $next);

    public function clearNext();

    public function clearPrev();

    /** @return mixed */
    public function getValue();

    /**
     * @param $value
     * @return void
     */
    public function setValue($value);

}