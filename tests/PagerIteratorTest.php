<?php

namespace Tests\Indigo\Iterator;

use Indigo\Iterator\PagerIterator;

class PagerIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testCallbacksAreWorking()
    {
        $page = 1;

        $currentPage = $currentPageKey = function() use (&$page) {
            return $page;
        };

        $nextPage = function() use (&$page) {
            return $page + 1;
        };

        $totalPages = function() {
            return 10;
        };

        $setCurrentPage = function($newPage) use (&$page) {
            $page = $newPage;
        };

        $iterator = new PagerIterator(
            $currentPage,
            $nextPage,
            $currentPageKey,
            $totalPages,
            $setCurrentPage
        );

        $array = iterator_to_array($iterator);

        $this->assertEquals($array, array_combine(range(1, 10, 1), range(1, 10, 1)));
    }
}
