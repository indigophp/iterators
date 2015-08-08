<?php

namespace Indigo\Iterators;

/**
 * Wraps an iterator and allows to set the count manually
 * (eg. based on database COUNT result)
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class ManualCountIterator extends \IteratorIterator implements \Countable
{
    /**
     * @var integer
     */
    protected $count;

    /**
     * @param \Traversable $iterator
     * @param integer      $count
     */
    public function __construct(\Traversable $iterator, $count)
    {
        $this->count = $count;

        parent::__construct($iterator);
    }
    /**
     * {@inheritdoc
     */
    public function count()
    {
        return $this->count;
    }

}
