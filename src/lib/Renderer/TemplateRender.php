<?php

declare(strict_types=1);

namespace MultiRssCombiner\Renderer;

use MultiRssCombiner\Value\General;

interface TemplateRender
{
    /**
     * @param \MultiRssCombiner\Value\General $configuration
     * @param \MultiRssCombiner\Value\Item[] $items
     */
    public function display(General $configuration, array $items): void;
}
