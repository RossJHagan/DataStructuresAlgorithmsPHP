<?php

namespace RossJHagan\DataStructures\Core;

class Node implements NodeInterface
{
    
    protected $value;

    /** @var NodeInterface $next  */
    protected $next;

    public function __construct($value, NodeInterface $next = null)
    {

        $this->value = $value;
        $this->next = $next;

    }

    public function getNext()
    {
        return $this->next;
    }

    public function setNext(NodeInterface $next)
    {
        $this->next = $next;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function clearNext()
    {
        $this->next = null;
    }

}