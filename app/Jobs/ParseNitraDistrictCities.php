<?php

namespace App\Jobs;

use App\Parser\ParserInterface;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class ParseNitraDistrictCities implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Collection $nitraSubDistrictsCitiesUrls)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(ParserInterface $parser): void
    {
        $parser->parseAndImport($this->nitraSubDistrictsCitiesUrls);
    }
}
