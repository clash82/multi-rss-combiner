<?php declare(strict_types=1);

namespace MultiRssCombiner\Manager;

use MultiRssCombiner\Value\Item;

interface CacheManager
{
    public function add(Item $item): void;

    public function save(): void;
}
