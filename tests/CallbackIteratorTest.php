<?php

namespace Tests\Indigo\Iterator;

use Indigo\Iterator\CallbackIterator;

class CallbackIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testCallbacksAreWorking()
    {
        $counter = 1;

        $current = function() use (&$counter) {
            return $counter;
        };

        $next = function() use (&$counter) {
            $counter++;
        };

        $key = function() use (&$counter) {
            return $counter;
        };

        $valid = function() use (&$counter) {
            return $counter < 10;
        };

        $rewind = function() use (&$counter) {
            $counter = 1;
        };

        $iterator = new CallbackIterator(
            $current,
            $next,
            $key,
            $valid,
            $rewind
        );

        $array = iterator_to_array($iterator);

        $this->assertEquals($array, array_combine(range(1, 9, 1), range(1, 9, 1)));
    }
}
