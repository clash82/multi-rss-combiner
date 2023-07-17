<?php declare(strict_types=1);

namespace MultiRssCombiner\Renderer;

use MultiRssCombiner\Exception\TemplateNotFoundException;
use MultiRssCombiner\Value\General;
use MultiRssCombiner\Value\Item;

abstract class AbstractRender
{
    /**
     * @param Item[] $items
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

        $output = (string)ob_get_clean();

        // remove useless white characters, multiple spaces etc.
        $output = trim(preg_replace('/\s\s+/', ' ', $output));

        return str_replace(["\t", "\r", "\n"], '', $output);
    }
}
