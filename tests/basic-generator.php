<?php

function getItems(): Generator
{
    yield 'Item 1';
    yield 'Item 2';
    yield 'Item 3';
    yield 'Item 4';
    yield 'Item 5';
}

function getLoopItems(): Generator
{
    for ($i = 0; $i < 5; $i++) {
        yield $i => 'Item ' . ($i + 1);
    }
}

echo "Normal:\n--------------\n";

foreach (getItems() as $item) {
    echo "$item\n";
}

echo "\nFrom loop:\n--------------\n";

foreach (getLoopItems() as $key => $value) {
    echo "$key -> $value\n";
}