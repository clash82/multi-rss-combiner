<?php

declare(strict_types=1);

namespace MultiRssCombiner\Provider;

interface CacheProvider
{
    /**
     * @return \MultiRssCombiner\Value\Item[]
     */
    public function get(): array;
}
