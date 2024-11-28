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

            $this->channels[$fileInfo->getFilename()] = new Channel(
                $fileInfo->getFilename(),
                $ini['name'],
                $ini['url'],
                isset($ini['trim']) && $ini['trim']
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

    public function getById(string $id): Channel
    {
        return $this->channels[$id];
    }

    public function channelExists(string $id): bool
    {
        return isset($this->channels[$id]);
    }
}
