<?php

namespace App\Geocoder;

use Geocoder\Laravel\ProviderAndDumperAggregator as Geocoder;

abstract class GeocoderAbstract
{
    public function __construct(protected Geocoder $geocoder)
    {
    }
}
