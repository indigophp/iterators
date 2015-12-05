<?php

namespace Indigo\Iterator;

/**
 * Pass callbacks as iterator methods.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class CallbackIterator implements \Iterator
{
    /**
     * @var callable
     */
    protected $current;

    /**
     * @var callable
     */
    protected $next;

    /**
     * @var callable
     */
    protected $key;

    /**
     * @var callable
     */
    protected $valid;

    /**
     * @var callable
     */
    protected $rewind;

    /**
     * @param callable $current
     * @param callable $next
     * @param callable $key
     * @param callable $valid
     * @param callable $rewind
     */
    public function __construct(
        callable $current,
        callable $next,
        callable $key,
        callable $valid,
        callable $rewind
    ) {
        $this->current = $current;
        $this->next = $next;
        $this->key = $key;
        $this->valid = $valid;
        $this->rewind = $rewind;
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return call_user_func($this->current);
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        call_user_func($this->next);
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return call_user_func($this->key);
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return call_user_func($this->valid);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        call_user_func($this->rewind);
    }
}
