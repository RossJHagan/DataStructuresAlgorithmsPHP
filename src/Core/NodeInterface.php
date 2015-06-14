<?php

namespace RossJHagan\DataStructures\Core;

/**
 * Interface NodeInterface
 * @package RossJHagan\DataStructures\Core
 */
interface NodeInterface
{

    /** @return NodeInterface */
    public function getNext();

    public function clearNext();

    public function setNext(NodeInterface $next);

    public function getValue();

    public function setValue($value);

}