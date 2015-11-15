<?php

namespace Indigo\Iterators;

/**
 * This is an extension of the SPL AppendIterator.
 *
 * Accepts a Traversable containing Iterators.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class ManualCountIterator extends \AppendIterator
{
    /**
     * @param \Traversable $iterator
     */
    public function __construct(\Traversable $iterators)
    {
        iterator_apply($iterators, [$this, 'append']);
    }
}
