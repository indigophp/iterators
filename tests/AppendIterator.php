<?php

namespace Indigo\Iterators\Tests;

use Indigo\Iterators\AppendIterator;

class AppendIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testIteratorsAppended()
    {
        $iterator1 = new \ArrayIterator(['item1']);
        $iterator2 = new \ArrayIterator(['item2']);
        $iterators = new \ArrayIterator([
            $iterator1,
            $iterator2,
        ]);

        $iterator = new AppendIterator($iterators);

        $this->assertInstanceOf('AppendIterator', $iterator);

        $keys = [];
        $values = [];

        foreach ($iterator as $key => $value) {
            $keys[] = $key;
            $values[] = $value;
        }

        $this->assertEquals($keys, [0, 1]);
        $this->assertEquals($values, ['item1', 'item2']);
    }
}
