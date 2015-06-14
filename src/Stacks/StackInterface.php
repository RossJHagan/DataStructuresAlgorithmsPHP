<?php

namespace RossJHagan\DataStructures\Stacks;


interface StackInterface {

    public function push($value);

    public function pop();

    public function peek();

    public function clear();

}