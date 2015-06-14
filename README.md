# Data Structures in PHP

A set of 'just for learning' data structures in PHP, do not use in production.  Constructive code reviews are very 
welcome.  Contributions are also welcome to improve this repository for others to learn from.

## Important

These are not real implementations, 100% test coverage is aimed for but this doesn't guarantee a problem-free solution.
All of the structures here are 'just for fun', and you should check the
[Standard PHP Library (SPL)](http://php.net/manual/en/book.spl.php) for usable implementations.  Interfaces may be
missing standard features, attempts have been made to keep atypical methods out of the interfaces.
 
## Structures Implemented

### Lists

You should use [SPL DoublyLinkedList](http://php.net/manual/en/class.spldoublylinkedlist.php).

- LinkedList
- DoublyLinkedList

### Queues

You should use [SPL Queue](http://php.net/manual/en/class.splqueue.php) or [SPL Priority Queue](http://php.net/manual/en/class.splpriorityqueue.php).

- LinkedListQueue

### Stacks

You should use [SPL Stack](http://php.net/manual/en/class.splstack.php).

- ArrayStack
- LinkedListStack

## Coming soon(ish)

- Tree

## References Used

- Cormen et al. *Introduction to Algorithms* [MIT Press](https://mitpress.mit.edu/books/introduction-algorithms)
- [Pluralsight](https://www.pluralsight.com)'s *Algorithms and Data Structures* [Part 1](http://www.pluralsight.com/courses/ads-part1) [Part 2](http://www.pluralsight.com/courses/ads-part2)

## Miscellaneous Notes

The repo typically defaults to using a plain `array` where an array is called for.  Also consider the
[SPL FixedArray](http://php.net/manual/en/class.splfixedarray.php), e.g. for an ArrayQueue.
