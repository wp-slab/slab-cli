<?php

include 'vendor/autoload.php';

include 'vendor/wp-slab/slab-core/src/Autoloader.php';
(new Slab\Core\Autoloader)->registerNamespace('Slab\Cli', __DIR__ . '/src');
