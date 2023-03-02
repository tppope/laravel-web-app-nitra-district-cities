<?php

namespace App\Geocoder;

use Illuminate\Bus\Batch;
use Illuminate\Support\Collection;

interface GeocoderInterface
{
    public function geocodeAndImport(Collection $cities): void;

}
