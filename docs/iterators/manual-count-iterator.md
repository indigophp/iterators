# Manual Count Iterator

This iterator accepts two parameters:

- A `Traversable` object
- An integer (the count of the object)

This allows you to create iterators for data which would be too long to count usint `iterator_count`. The most common case for this is the number of rows of a database result: You can count the result using `COUNT` SQL command which takes much less time than iterating through the whole result set.

The iterator also implements `Countable` interface to make counting easier.

``` php
use Indigo\Iterators\ManualCountIterator;

$iterator = new ManualCountIterator(new \ArrayIterator([]), 0);

// Returns 0
count($iterator);
```
