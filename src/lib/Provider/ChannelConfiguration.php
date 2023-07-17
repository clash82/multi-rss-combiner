<?php declare(strict_types=1);

namespace MultiRssCombiner\Provider;

use MultiRssCombiner\Value\Channel;

class ChannelConfiguration implements ChannelConfigurationProvider
{
    /** @var Channel[] */
    private array $channels = [];

    public function __construct(string $path)
    {
        $channelPath = sprintf('%s%s', getcwd(), $path);

        foreach (new \DirectoryIterator($channelPath) as $fileInfo) {
            if ($fileInfo->isDot()
                || 'general.ini' === $fileInfo->getFilename()
                || 'ini' !== $fileInfo->getExtension()) {
                continue;
            }

            $ini = (array)parse_ini_file($fileInfo->getRealPath());

            $this->channels[] = new Channel(
                $ini['name'],
                $ini['url']
            );
        }
    }

    /**
     * @return Channel[]
     */
    public function getAll(): array
    {
        return $this->channels;
    }
}
