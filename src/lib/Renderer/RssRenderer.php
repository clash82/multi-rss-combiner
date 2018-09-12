<?php

declare(strict_types=1);

namespace MultiRssCombiner\Renderer;

use MultiRssCombiner\Value\General;

class RssRenderer extends AbstractRender implements TemplateRender
{
    /**
     * @param \MultiRssCombiner\Value\General $configuration
     * @param \MultiRssCombiner\Value\Item[] $items
     *
     * @throws \MultiRssCombiner\Exception\TemplateNotFoundException
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
