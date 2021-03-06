<?php

namespace Tests\Indigo\Iterator;

use Indigo\Iterator\AppendIterator;

class AppendIteratorTest extends AppendIteratorTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function createAppendIterator(\Iterator $iterators)
    {
        return new AppendIterator($iterators);
    }
}
