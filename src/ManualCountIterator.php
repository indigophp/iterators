<?php

namespace Indigo\Iterators;

/**
 * Wraps an iterator and allows to set the count manually.
 *
 * Example: based on database COUNT result.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class ManualCountIterator extends \IteratorIterator implements \Countable
{
    /**
     * @var int
     */
    protected $count;

    /**
     * @param \Traversable $iterator
     * @param int          $count
     */
    public function __construct(\Traversable $iterator, $count)
    {
        $this->count = $count;

        parent::__construct($iterator);
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return $this->count;
    }
}
