<?php

namespace Tests\Indigo\Iterator;

use Indigo\Iterator\ManualCountIterator;

class ManualCountIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testCount()
    {
        $traversable = new \ArrayIterator([]);
        $iterator = new ManualCountIterator($traversable, 0);

        $this->assertInstanceOf('IteratorIterator', $iterator);
        $this->assertInstanceOf('Countable', $iterator);
        $this->assertEquals(0, count($iterator));
    }
}
