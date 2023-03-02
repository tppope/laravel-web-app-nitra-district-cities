<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Bus;
use App\Jobs\GeocodeNitraDistrictCities as GeocodeNitraDistrictCitiesJob;

class GeocodeNitraDistrictCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:geocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import latitude and longitude attributes to Nitra district cities models using Google Geocoding API';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        $batch = Bus::batch([])->dispatch();

        City::all()->chunk(30)->each(fn(Collection $chunkCities) => $batch->add(new GeocodeNitraDistrictCitiesJob($chunkCities)));

        $progressBar = $this->output->createProgressBar(100);

        $progressBar->start();
        while ($batch->progress() < 100) {
            $progressBar->setProgress($batch->progress());
            $batch = $batch->fresh();
            sleep(1);
        }

        $progressBar->setProgress($batch->progress());

        $progressBar->finish();
//        $city = City::query()->first();
//        $geocoder = app('geocoder');
//        $cityHallAddress = $city->cityHallAddress;
//        $address = $cityHallAddress->street_name . ' ' . $cityHallAddress->house_number . ', ' . $cityHallAddress->city_name . ', Slovakia';
//        $result = $geocoder->geocode($address)->get();
//        $coordinates = $result[0]?->getCoordinates();
//        $city->latitude =  $coordinates?->getLatitude();
//        $city->longitude =  $coordinates?->getLongitude();
//
//        $city->save();
    }
}
