<?php

namespace RossJHagan\DataStructures\Queues;

interface QueueInterface {

    public function enqueue($value);

    public function dequeue();

    public function peek();

}