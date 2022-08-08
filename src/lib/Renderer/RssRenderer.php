<?php declare(strict_types=1);

namespace MultiRssCombiner\Renderer;

use MultiRssCombiner\Exception\TemplateNotFoundException;
use MultiRssCombiner\Value\General;
use MultiRssCombiner\Value\Item;

class RssRenderer extends AbstractRender implements TemplateRender
{
    /**
     * @param Item[] $items
     *
     * @throws TemplateNotFoundException
     */
    public function display(General $configuration, array $items): void
    {
        // TODO: xml header cannot be included directly in rss.phtml file,
        //       so we have to add it dynamically when rendering output

        $output = sprintf(
            '%s%s',
            '<?xml version="1.0" encoding="UTF-8" ?>',
            $this->parseTemplate('rss.phtml', $configuration, $items)
        );

        echo $output;
    }
}
