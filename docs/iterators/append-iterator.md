# Append Iterator

This iterator is an extension of the SPL [AppendIterator](http://php.net/manual/en/class.appenditerator.php).

It accepts a `Traversable` in the constructor. This is useful because you don't have to call `append` manually for
each iterators.

``` php
use Indigo\Iterator\AppendIterator;

$iterator = new AppendIterator(new \ArrayIterator([
    new \ArrayIterator([]),
]));
```
