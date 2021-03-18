<?php

declare(strict_types=1);

namespace MultiRssCombiner\Renderer;

use MultiRssCombiner\Exception\TemplateNotFoundException;
use MultiRssCombiner\Value\General;

abstract class AbstractRender
{
    /**
     * @param \MultiRssCombiner\Value\Item[] $items
     *
     * @throws TemplateNotFoundException
     */
    protected function parseTemplate(string $filename, General $configuration, array $items): string
    {
        $filePath = sprintf('%s/src/templates/%s', getcwd(), $filename);

        if (!file_exists($filePath)) {
            throw new TemplateNotFoundException();
        }

        ob_start();
        include $filePath;

        $output = ob_get_clean();

        // remove useless white characters, multiple spaces etc.
        $output = trim(preg_replace('/\s\s+/', ' ', $output));
        $output = str_replace(["\t", "\r", "\n"], '', $output);

        return $output;
    }
}
