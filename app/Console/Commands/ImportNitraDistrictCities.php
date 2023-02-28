<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportNitraDistrictCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse data for all cities located in Nitra district from https://www.e-obce.sk/kraj/NR.html';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        //TODO
    }
}
