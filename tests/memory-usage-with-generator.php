<?php

function getRecords(): Generator
{
    for ($i = 0; $i < 100_000; $i++) {
        yield "Record $i";
    }
}

function formatRecords(Generator $records): Generator
{
    foreach ($records as $index => $record) {
        yield "[$index] -> $record";
    }
}

$registers = formatRecords(getRecords());

foreach ($registers as $register) {
    echo "$register\n";
}

echo 'Used memory: ~' . round((memory_get_peak_usage() / 1024 / 1024), 2) . "MB\n";