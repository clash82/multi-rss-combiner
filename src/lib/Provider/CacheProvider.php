<?php declare(strict_types=1);

namespace MultiRssCombiner\Provider;

use MultiRssCombiner\Value\Item;

interface CacheProvider
{
    /**
     * @return Item[]
     */
    public function get(): array;
}
