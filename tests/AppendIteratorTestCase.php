<?php

namespace Tests\Indigo\Iterator;

abstract class AppendIteratorTestCase extends \PHPUnit_Framework_TestCase
{
    public function testItIsAnAppendIterator ()
    {
        $iterator = $this->createAppendIterator(new \ArrayIterator());

        $this->assertInstanceOf('AppendIterator', $iterator);
    }

    public function testIteratorsAppended()
    {
        $iterators = $this->getIterators();

        $iterator = $this->createAppendIterator($iterators);

        $keys = [];
        $values = [];

        foreach ($iterator as $key => $value) {
            $keys[] = $key;
            $values[] = $value;
        }

        $this->assertEquals($keys, [0, 0, 0, 1]);
        $this->assertEquals($values, ['item1', 'item2', 'item3', 'item4']);
    }

    public function testIteratorsWithRewind()
    {
        $iterators = $this->getIterators();

        $iterator = $this->createAppendIterator($iterators);

        $iterator->rewind();

        $this->assertEquals(0, $iterator->key());
        $this->assertEquals('item1', $iterator->current());
        $this->assertTrue($iterator->valid());

        $iterator->next();

        $this->assertEquals(0, $iterator->key());
        $this->assertEquals('item2', $iterator->current());
        $this->assertTrue($iterator->valid());

        $keys = [];
        $values = [];

        for ($iterator->rewind(); $iterator->valid(); $iterator->next()) {
            $keys[] = $iterator->key();
            $values[] = $iterator->current();
        }

        $this->assertEquals($keys, [0, 0, 0, 1]);
        $this->assertEquals($values, ['item1', 'item2', 'item3', 'item4']);

        $keys = [];
        $values = [];

        foreach ($iterator as $key => $value) {
            $keys[] = $key;
            $values[] = $value;
        }

        $this->assertEquals($keys, [0, 0, 0, 1]);
        $this->assertEquals($values, ['item1', 'item2', 'item3', 'item4']);
    }

    private function getIterators()
    {
        $iterator1 = new \ArrayIterator(['item1']);
        $iterator2 = new \ArrayIterator(['item2']);
        $iterator3 = new \ArrayIterator([
            'item3',
            'item4',
        ]);

        return new \ArrayIterator([
            $iterator1,
            $iterator2,
            $iterator3,
        ]);
    }

    /**
     * @param \Iterator $iterators
     *
     * @return \AppendIterator
     */
    abstract protected function createAppendIterator(\Iterator $iterators);
}
