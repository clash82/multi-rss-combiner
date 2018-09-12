multi-rss-combiner
==================

This is simple script that combines many RSS channels into single one (includes also nice page to display all items - same as Feedburner is doing).

Author: [Rafał Toborek](https://toborek.info)

Installation
------------

- using `Composer`

```bash
composer create-project --no-dev --prefer-dist clash82/multi-rss-combiner
```

- create default configuration file `config/general.ini` based on the `config/general.ini.dist` file

- add RSS channels by creating new `*.ini` files in `config` directory. Use `sample.ini.dist` file as a base settings file

- upload everything to WWW server (Apache2 is recommended)

- call `cron.php` file to fill cache with existing RSS entries (please unsure that `cache` directory is writable). Execute `cron.php` file how many times you want to update RSS cache

- visit your new page to see nice list of all RSS entries on a single page (RSS subscribe link is visible at the bottom of the page)

You can see working demo at [https://puls.toborek.info](https://puls.toborek.info). Feel free to contribute.
