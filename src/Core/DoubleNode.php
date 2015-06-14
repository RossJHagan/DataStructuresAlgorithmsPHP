<?php


namespace RossJHagan\DataStructures\Core;

/**
 * Class DoubleNode
 *
 * @package RossJHagan\DataStructures\Core
 */
class DoubleNode implements DoubleNodeInterface {

    /** @var DoubleNodeInterface $prev */
    protected $prev;

    /** @var DoubleNodeInterface $next */
    protected $next;

    /** @var mixed $value */
    protected $value;

    public function __construct($value, $prev = null, $next = null)
    {
        $this->value = $value;
        $this->prev = $prev;
        $this->next = $next;
    }

    /** @return DoubleNodeInterface */
    public function getPrev()
    {
        return $this->prev;
    }

    /**
     * @param DoubleNodeInterface $doubleNode
     */
    public function setPrev(DoubleNodeInterface $doubleNode)
    {
        $this->prev = $doubleNode;
    }

    /** @return NodeInterface */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * @param DoubleNodeInterface $next
     */
    public function setNext(DoubleNodeInterface $next)
    {
        $this->next = $next;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    public function clearNext()
    {
        $this->next = null;
    }

    public function clearPrev()
    {
        $this->prev = null;
    }

}