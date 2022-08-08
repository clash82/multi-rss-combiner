<?php declare(strict_types=1);

namespace MultiRssCombiner\Renderer;

use MultiRssCombiner\Exception\TemplateNotFoundException;
use MultiRssCombiner\Value\General;
use MultiRssCombiner\Value\Item;

class PageRenderer extends AbstractRender implements TemplateRender
{
    /**
     * @param Item[] $items
     *
     * @throws TemplateNotFoundException
     */
    public function display(General $configuration, array $items): void
    {
        echo $this->parseTemplate('page.phtml', $configuration, $items);
    }
}
