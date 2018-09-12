<?php

declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';

(new \MultiRssCombiner\App())->buildView(isset($_GET['xml']) ? false : true);
