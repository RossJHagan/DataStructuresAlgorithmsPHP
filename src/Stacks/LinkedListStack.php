<?php

namespace RossJHagan\DataStructures\Stacks;


use RossJHagan\DataStructures\Lists\LinkedList;
use RossJHagan\DataStructures\Lists\LinkedListInterface;

/**
 * Class LinkedListStack
 *
 * @package RossJHagan\DataStructures\Stacks
 */
class LinkedListStack implements StackInterface {

    /** @var LinkedListInterface $list  */
    protected $list;

    /**
     * __construct initialises the stack with an empty list.  Optionally pass in the linked list to use, given
     * for testing purposes.
     *
     * @param LinkedListInterface $list
     */
    public function __construct(LinkedListInterface $list = null)
    {

        if ( is_null($list) ) {

            $list = new LinkedList();

        }
        
        $this->list = $list;

    }

    /**
     * @param mixed $value
     */
    public function push($value)
    {
        $this->list->addValueToStart($value);
    }

    /**
     * @return mixed
     */
    public function pop()
    {

        if ( is_null($this->list->getHead()) ) {
            return;
        }

        $value = $this->peek();
        $this->list->removeFirst();
        return $value;
    }

    /**
     * @return mixed
     */
    public function peek()
    {
        if ( is_null($this->list->getHead()) ) {
            return null;
        }

        return $this->list->getHead()->getValue();
    }

    public function clear()
    {
        $this->list = new LinkedList();
    }

}