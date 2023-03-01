<?php

namespace App\Parser;

use Illuminate\Bus\Batch;

interface ParserInterface
{
    public function parseAndImport($url): void;

}
