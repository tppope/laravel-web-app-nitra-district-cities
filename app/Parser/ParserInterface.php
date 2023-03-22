<?php

namespace App\Parser;

use Illuminate\Bus\Batch;
use Illuminate\Support\Collection;

interface ParserInterface
{
    public function parseAndImport(Collection $urls): Batch|null;
}
