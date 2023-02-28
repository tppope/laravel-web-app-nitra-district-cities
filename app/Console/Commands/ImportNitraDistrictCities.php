<?php

namespace App\Console\Commands;

use DOMDocument;
use DOMNode;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

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

    protected DOMDocument $dom;

    /**
     * Execute the console command.
     */
    public function handle(DOMDocument $dom): void
    {
        $this->dom = $dom;

        $url = 'https://www.e-obce.sk/kraj/NR.html';
        $this->loadHtmlDom($url);


    }

    private function loadHtmlDom(string $url)
    {
        libxml_use_internal_errors(true);
        if ($this->dom->loadHTML(file_get_contents($url))) {
            foreach (libxml_get_errors() as $error) {
                if ($error->level > 2) {
                    $this->error($error->message);
                    return;
                }
            }
            libxml_clear_errors();
        }
        libxml_use_internal_errors(false);

    }


}
