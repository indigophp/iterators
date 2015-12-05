# Lazy Append Iterator

This iterator is an extension of the SPL [AppendIterator](http://php.net/manual/en/class.appenditerator.php).

It accepts an `Iterator` in the constructor.
This is useful when moving to the next element invokes an expensive resolver logic.
The passed iterator's next element is only resolved when the previous element has become invalid.
And the good news is it is only called once: after it is appended to the iterator it is not called anymore.

``` php
use Indigo\Iterator\LazyAppendIterator;

$iterator = new LazyAppendIterator(new \ArrayIterator([
    new \ArrayIterator([]),
]));
```
