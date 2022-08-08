<?php declare(strict_types=1);

namespace MultiRssCombiner\Provider;

use MultiRssCombiner\Value\Channel;

interface ChannelConfigurationProvider
{
    /**
     * @return Channel[]
     */
    public function getAll(): array;
}
