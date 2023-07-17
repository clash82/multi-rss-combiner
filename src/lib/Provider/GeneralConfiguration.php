<?php declare(strict_types=1);

namespace MultiRssCombiner\Provider;

use MultiRssCombiner\Exception\ConfigurationNotFoundException;
use MultiRssCombiner\Value\General;

class GeneralConfiguration implements GeneralConfigurationProvider
{
    private readonly General $configuration;

    public function __construct(string $filename)
    {
        $configurationFile = sprintf('%s/%s', getcwd(), $filename);

        if (!file_exists($configurationFile)) {
            throw new ConfigurationNotFoundException();
        }

        $ini = (array)parse_ini_file($configurationFile);

        $this->configuration = new General(
            $ini['title'],
            $ini['description'],
            $ini['link'],
            $ini['language'],
            $ini['copyright'],
            $ini['icon'],
            (int) $ini['icon_width'],
            (int) $ini['icon_height'],
            $ini['date_format'],
            (int) $ini['limit'],
            $ini['guid_prefix']
        );
    }

    public function get(): General
    {
        return $this->configuration;
    }
}
