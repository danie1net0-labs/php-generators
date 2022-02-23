<?php

namespace App;

use Generator;
use OutOfBoundsException;
use SeekableIterator;

class LineFileIterator implements SeekableIterator
{
    private Generator $generator;

    public function __construct(private string $filePath)
    {
        $this->rewind();
    }

    public function current(): string
    {
        return $this->generator->current();
    }

    public function next(): void
    {
        $this->generator->next();
    }

    public function key(): int
    {
        return (int) $this->generator->key();
    }

    public function valid(): bool
    {
        return $this->generator->valid();
    }

    public function rewind(): void
    {
        $this->generator = $this->getGenerator();
    }

    public function seek(int $offset): void
    {
        while ($this->valid()) {
            if ($this->generator->key() === $offset) {
                return;
            }

            $this->generator->next();
        }

        throw new OutOfBoundsException("Invalid position ($offset).");
    }

    private function getGenerator(): Generator
    {
        $file = fopen($this->filePath, 'rb');

        while (! feof($file)) {
            yield fgets($file);
        }

        fclose($file);
    }
}