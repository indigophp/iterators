<?php

namespace Indigo\Iterator;

/**
 * Iterator used for pagination.
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class PagerIterator extends CallbackIterator
{
    /**
     * @var int
     */
    protected $currentPage;

    /**
     * @param callable $currentPage
     * @param callable $nextPage
     * @param callable $currentPageKey
     * @param callable $totalPages
     * @param callable $setCurrentPage
     */
    public function __construct(
        callable $currentPage,
        callable $nextPage,
        callable $currentPageKey,
        callable $totalPages,
        callable $setCurrentPage
    ) {
        parent::__construct(
            $currentPage,
            $nextPage,
            $currentPageKey,
            $totalPages,
            $setCurrentPage
        );
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        $this->currentPage++;

        if ($this->valid()) {
            call_user_func($this->rewind, call_user_func($this->next));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->currentPage <= call_user_func($this->valid);
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->currentPage = 1;

        call_user_func($this->rewind, $this->currentPage);
    }
}
