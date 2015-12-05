<?php

namespace Indigo\Iterator;

/**
 * This is an extension of the SPL AppendIterator.
 *
 * Accepts a Traversable containing Iterators.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class AppendIterator extends \AppendIterator
{
    /**
     * @param \Traversable $iterators
     */
    public function __construct(\Traversable $iterators)
    {
        parent::__construct();

        foreach ($iterators as $iterator) {
            $this->append($iterator);
        }
    }
}
