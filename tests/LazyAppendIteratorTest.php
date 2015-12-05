<?php

namespace Tests\Indigo\Iterator;

use Indigo\Iterator\LazyAppendIterator;

class LazyAppendIteratorTest extends AppendIteratorTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function createAppendIterator(\Iterator $iterators)
    {
        return new LazyAppendIterator($iterators);
    }
}
