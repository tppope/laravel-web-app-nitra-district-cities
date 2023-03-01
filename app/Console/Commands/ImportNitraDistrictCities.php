<?php

namespace App\Console\Commands;

use App\Parser\ParserInterface;
use Illuminate\Console\Command;
use Psy\Exception\ParseErrorException;

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
    public function handle(ParserInterface $parser): void
    {

        $url = 'https://www.e-obce.sk/kraj/NR.html';

        try {
            $batch = $parser->parseAndImport(collect($url));
        } catch (ParseErrorException $error) {
            $this->error($error->getMessage());
        }

    }


}
