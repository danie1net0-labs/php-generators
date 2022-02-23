<?php

require_once 'vendor/autoload.php';

use App\LineFileIterator;

$iterator = new LineFileIterator(__DIR__ . '/file.txt');

$iterator->seek(50_000);

echo $iterator->current();

$iterator->next();

echo $iterator->current();

echo 'Used memory: ~' . round((memory_get_peak_usage() / 1024 / 1024), 2) . "MB\n";