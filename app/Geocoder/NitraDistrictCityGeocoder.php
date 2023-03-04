<?php

namespace App\Geocoder;

use App\Models\City;
use Illuminate\Bus\Batch;
use Illuminate\Support\Collection;

class NitraDistrictCityGeocoder extends GeocoderAbstract implements GeocoderInterface
{

    public function geocodeAndImport(Collection $cities): void
    {
        $cities->each(function (City $city) {
            $cityHallAddress = $city->cityHallAddress;
            $address = $cityHallAddress->street_name . ' ' . $cityHallAddress->house_number . ', ' . $cityHallAddress->city_name . ', Slovakia';
            $result = $this->geocoder->geocode($address)->get();
            $coordinates = $result[0]?->getCoordinates();
            $city->latitude =  $coordinates?->getLatitude();
            $city->longitude =  $coordinates?->getLongitude();

            $city->save();
        });

    }
}
