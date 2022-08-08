<?php declare(strict_types=1);

namespace MultiRssCombiner\Provider;

use MultiRssCombiner\Value\General;

interface GeneralConfigurationProvider
{
    public function get(): General;
}
