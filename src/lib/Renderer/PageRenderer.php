<?php

declare(strict_types=1);

namespace MultiRssCombiner\Renderer;

use MultiRssCombiner\Value\General;

class PageRenderer extends AbstractRender implements TemplateRender
{
    /**
     * @param \MultiRssCombiner\Value\General $configuration
     * @param \MultiRssCombiner\Value\Item[] $items
     *
     * @throws \MultiRssCombiner\Exception\TemplateNotFoundException
     */
    public function display(General $configuration, array $items): void
    {
        echo $this->parseTemplate('page.phtml', $configuration, $items);
    }
}
