<?php

use RossJHagan\DataStructures\Core\DoubleNode;
use RossJHagan\DataStructures\Core\Node;
use RossJHagan\DataStructures\Lists\DoublyLinkedList;
use RossJHagan\DataStructures\Lists\LinkedList;

require_once __DIR__ . '/../vendor/autoload.php';

$klein = new \Klein\Klein();

$klein->respond('GET', '/linkedlist/enumerate', function () {

    $list = new LinkedList();
    $list->add(new Node(10));
    $list->add(new Node(20));
    $list->add(new Node(30));

    return implode(", ", iterator_to_array($list->enumerate()));

});

$klein->respond('GET', '/linkedlist/?', function () {

    $list = new LinkedList();
    $list->add(new Node(1));
    $list->add(new Node(2));
    $list->add(new Node(3));

    return '<pre>' . print_r($list, true) . '</pre>';

});

$klein->respond('GET', '/doublylinkedlist/?', function () {

    $doublyList = new DoublyLinkedList();

    foreach ( range(1, 15) as $i ) {

        $doublyList->add(new DoubleNode($i));
    }

    return '<pre>' . print_r($doublyList, true) . '</pre>';

});

$klein->respond('GET', '/doublylinkedlist/remove/[:listValue]', function ($request) {

    $listValue = (int) $request->listValue;

    if ( 0 > $listValue || 15 < $listValue ) {
        return "Can't remove that value!";
    }

    $doublyList = new DoublyLinkedList();

    foreach ( range(1, 15) as $i ) {
        $doublyList->add(new DoubleNode($i));
    }

    $doublyList->remove(new DoubleNode($listValue));

    return '<pre>' . print_r($doublyList, true) . '</pre>';

});


$klein->dispatch();
