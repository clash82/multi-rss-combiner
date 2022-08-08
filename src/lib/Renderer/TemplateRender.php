<?php declare(strict_types=1);

namespace MultiRssCombiner\Renderer;

use MultiRssCombiner\Value\General;
use MultiRssCombiner\Value\Item;

interface TemplateRender
{
    /**
     * @param Item[] $items
     */
    public function display(General $configuration, array $items): void;
}
