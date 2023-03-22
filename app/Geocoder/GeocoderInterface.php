<?php

namespace App\Geocoder;

use Illuminate\Support\Collection;

interface GeocoderInterface
{
    public function geocodeAndImport(Collection $cities): void;
}
