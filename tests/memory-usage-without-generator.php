<?php

function getRecords(): array
{
    $records = [];

    for ($i = 0; $i < 100_000; $i++) {
        $records[] = "Record $i";
    }

    return $records;
}

function formatRecords(array $records): array
{
    $new = [];

    foreach ($records as $index => $record) {
        $new[] = "[$index] -> $record";
    }

    return $new;
}

$registers = formatRecords(getRecords());

foreach ($registers as $register) {
    echo "$register\n";
}

echo 'Used memory: ~' . round((memory_get_peak_usage() / 1024 / 1024), 2) . "MB\n";
