<?php

declare(strict_types=1);

namespace MultiRssCombiner\Provider;

interface ChannelConfigurationProvider
{
    /**
     * @return \MultiRssCombiner\Value\Channel[]
     */
    public function getAll(): array;
}
