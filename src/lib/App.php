<?php

declare(strict_types=1);

namespace MultiRssCombiner;

use MultiRssCombiner\Manager\RssCache as RssCacheManager;
use MultiRssCombiner\Provider\ChannelConfiguration;
use MultiRssCombiner\Provider\GeneralConfiguration;
use MultiRssCombiner\Provider\RssCache as RssCacheProvider;
use MultiRssCombiner\Renderer\PageRenderer;
use MultiRssCombiner\Renderer\RssRenderer;
use MultiRssCombiner\Value\Item;
use Wolfcast\BrowserDetection;

class App
{
    const APP_RSS_CACHE_FILE = '/cache/cache.xml';
    const APP_CONFIGURATION_FILE = '/config/general.ini';
    const APP_PUBLIC_FILES_DIR = '/public/';
    const APP_CHANNEL_CONFIGURATION_PATH = '/config/';

    public function buildView($showDefault = true): void
    {
        $configuration = new GeneralConfiguration(self::APP_CONFIGURATION_FILE);
        $cache = new RssCacheProvider(self::APP_RSS_CACHE_FILE, $configuration->get()->getLimit());
        $browser = new BrowserDetection();

        // detect if client belongs to the one of the supported web browsers or is just an RSS reader
        if (BrowserDetection::BROWSER_UNKNOWN === $browser->getName() || !$showDefault) {
            $template = new RssRenderer();

            header('Content-Type: application/rss+xml; charset=utf-8');
        } else {
            $template = new PageRenderer();
        }

        $template->display(
            $configuration->get(),
            $cache->get()
        );
    }

    public function buildCache(): void
    {
        $channels = new ChannelConfiguration(self::APP_CHANNEL_CONFIGURATION_PATH);

        $feed = new \SimplePie();
        $feed->enable_order_by_date(true);
        $feed->force_feed(true);
        $feed->enable_cache(false);

        $items = [];

        // fetch RSS details
        foreach ($channels->getAll() as $channel) {
            printf('Fetching %s (%s)<br>', $channel->getName(), $channel->getUrl());

            $feed->set_feed_url($channel->getUrl());

            if (!$feed->init()) {
                break;
            }

            $feedItems = $feed->get_items();

            if (!$feedItems) {
                break;
            }

            foreach ($feedItems as $item) {
                $date = new \DateTime($item->get_date());

                $item = new Item(
                    $channel->getName(),
                    $item->get_title() ?? '',
                    $item->get_description() ?? '',
                    $item->get_link() ?? '',
                    $item->get_id() ?? '',
                    $date
                );

                $items[] = $item;
            }
        }

        // reorder items
        usort($items, function ($a, $b) {
            return $b->getPubDate() <=> $a->getPubDate();
        });

        // store everything in cache
        $cache = new RssCacheManager(self::APP_RSS_CACHE_FILE);

        foreach ($items as $item) {
            $cache->add($item);
        }

        $cache->save();
    }
}
