<?php

namespace RossJHagan\DataStructures\Stacks;


class ArrayStack implements StackInterface {

    protected $list = array();

    protected $size = null;

    public function push($value)
    {
        $this->list[] = $value;

        if ( is_null($this->size) ) {
            $this->size = 0;
            return;
        }

        $this->size++;

    }

    public function pop()
    {

        if ( is_null($this->size) ) {
            return;
        }

        $popped = $this->list[$this->size];

        $this->size--;

        return $popped;

    }

    public function peek()
    {
        return $this->list[$this->size];
    }

    public function clear()
    {

        $this->list = array();
        $this->size = null;

    }
}