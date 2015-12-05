<?php

namespace Indigo\Iterator;

/**
 * This is an extension of the SPL AppendIterator.
 *
 * Lazily append iterators from a traversable object.
 * Useful when moving to the next element invokes an expensive resolver logic.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class LazyAppendIterator extends \AppendIterator
{
    /**
     * @var \Iterator
     */
    private $iterators;

    /**
     * @param \Iterator $iterators
     */
    public function __construct(\Iterator $iterators)
    {
        parent::__construct();

        $this->iterators = $iterators;

        $iterators->rewind();
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        $this->lazyAppend();

        return parent::current();
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        $this->lazyAppend();

        return parent::key();
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->lazyAppend();

        parent::next();
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->lazyAppend();

        return parent::rewind();
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        $this->lazyAppend();

        return parent::valid();
    }

    /**
     * Lazily append the next iterator to the chain
     */
    private function lazyAppend()
    {
        if (!parent::valid() and $this->iterators->valid()) {
            $this->append($this->iterators->current());
            $this->iterators->next();
        }
    }
}
