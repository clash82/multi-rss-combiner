<?php declare(strict_types=1);

use MultiRssCombiner\App;

require_once __DIR__.'/vendor/autoload.php';

(new App())->buildView(!isset($_GET['xml']));
