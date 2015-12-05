# Pager Iterator

``` php
use Indigo\Iterator\PagerIterator;

$pagerfanta = new Pagerfanta\Pagerfanta();

$iterator = new PagerIterator(
    [$pagerfanta, 'getIterator'],
    [$pagerfanta, 'getNextPage'],
    [$pagerfanta, 'getCurrentPage'],
    [$pagerfanta, 'getNbPages'],
    [$pagerfanta, 'setCurrentPage'],
);
```
