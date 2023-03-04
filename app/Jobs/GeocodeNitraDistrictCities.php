<?php

namespace App\Jobs;

use App\Geocoder\GeocoderInterface;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class GeocodeNitraDistrictCities implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Collection $cities)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(GeocoderInterface $geocoder): void
    {
        $geocoder->geocodeAndImport($this->cities);
    }
}
