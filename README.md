multi-rss-combiner
==================

![php-cs-fixer](https://github.com/clash82/multi-rss-combiner/actions/workflows/php-cs-fixer.yaml/badge.svg)
![phpstan](https://github.com/clash82/multi-rss-combiner/actions/workflows/phpstan.yaml/badge.svg)
![rector](https://github.com/clash82/multi-rss-combiner/actions/workflows/rector.yaml/badge.svg)

This is a simple script that combines multiple RSS channels into a single channel (it includes also a nice page to display all items - same as Feedburner is doing).

Author: [Rafał Toborek](https://kontakt.toborek.info)

Installation
------------

- use `Composer`:

```bash
composer create-project --no-dev --prefer-dist clash82/multi-rss-combiner
```

- create default configuration file `config/general.ini` (based on the `config/general.ini.dist` file)

- add RSS channels by creating new `*.ini` files in `config` directory (use `sample.ini.dist` file as a base settings file for your channels)

- upload everything to your web server (Apache2 is highly recommended)

- call `cron.php` file to fill cache with existing RSS entries (make sure that `cache` directory is writable). Execute `cron.php` file whenever you want to update RSS cache

- visit your new page to see a nice list of all RSS entries on a single page (RSS subscribe link is visible at the bottom of the page)

Working example can be found at [https://puls.toborek.info](https://puls.toborek.info). Feel free to contribute.

Jezus żyje! 🧡
