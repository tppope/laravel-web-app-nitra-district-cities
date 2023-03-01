<?php

namespace App\Console\Commands;

use App\Models\Address;
use App\Models\City;
use DOMDocument;
use DOMNode;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

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

        $allSubDistrictsUrls = $this->getAllSubDistrictsUrls();

        $allSubDistrictsUrls->each(function (string $subDistrictUrl) {
            $this->loadHtmlDom($subDistrictUrl);

            $allSubDistrictsCitiesUrls = $this->getAllSubDistrictsCitiesUrls();

            $this->importCities($allSubDistrictsCitiesUrls);

        });
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

    private function getAllSubDistrictsUrls(): Collection
    {
        return collect(
            $this
                ->dom
                ->getElementById('okres')
                ?->getElementsByTagName('a')
                ->getIterator()
        )->map(fn(DOMNode $node) => $node->attributes->getNamedItem('href')->textContent);
    }

    private function getAllSubDistrictsCitiesUrls(): Collection
    {
        return collect(
            $this
                ->dom
                ->getElementById('telo')
                ?->getElementsByTagName('a')->getIterator()
        )
            ->filter(
                fn(DOMNode $node) => $node->childNodes->length === 1
                    && Str::contains(
                        $node
                            ->attributes
                            ->getNamedItem('href')
                            ->textContent,
                        '/obec/')
            )
            ->mapWithKeys(fn(DOMNode $node) => [
                trim($node->textContent) => $node->attributes->getNamedItem('href')->textContent
            ]);
    }

    private function importCities(Collection $citiesUrls)
    {
        $citiesUrls->each(function ($cityUrl, $cityName) {
            $this->loadHtmlDom($cityUrl);

            $this->importCity($cityName);

            return false;
        });
    }

    private function importCity(string $cityName)
    {
        $editCityUrl = collect($this->dom?->getElementById('telo')?->getElementsByTagName('img')->getIterator())
            ->first(fn(DOMNode $node) => Str::contains($node->attributes->getNamedItem('src')->textContent, '/images/edit2.jpg'))
            ->parentNode->attributes->getNamedItem('href')->textContent;

        $this->loadHtmlDom($editCityUrl);

        parse_str(parse_url($editCityUrl)['query'], $query);

        $cityHallAddress = $this->importAddress($cityName);

        City::query()->updateOrCreate(
            [
                'id' => $query['id']
            ],
            [
                'name' => $cityName,
                'mayor_name' => trim($this->dom->getElementById('Starosta')->getAttribute('value')) ?: null,
                'phone_number' => $this->getPhoneNumber() ?: null,
                'fax' => trim($this->dom->getElementById('Fax')->getAttribute('value')) ?: null,
                'web_address' => trim($this->dom->getElementById('URL')->getAttribute('value')) ?: null,
                'email' => trim($this->dom->getElementById('Email')->getAttribute('value')) ?: null,
                'city_hall_address_id' => $cityHallAddress->id
            ]);
    }

    private function importAddress(string $cityName): Builder|Model
    {
        return Address::query()->updateOrCreate([
            'city_name' => $cityName,
            'street_name' => trim($this->dom->getElementById('Ulica')->getAttribute('value')),
            'house_number' => trim($this->dom->getElementById('Cislo')->getAttribute('value')),
        ], [
            'postal_code' => trim($this->dom->getElementById('Psc')->getAttribute('value')),
            'post_name' => trim($this->dom->getElementById('Posta')->getAttribute('value'))
        ]);
    }

    private function getPhoneNumber(): string
    {

        return trim($this->dom->getElementById('SmeroveCislo')->getAttribute('value')) . ' / '
            . trim($this->dom->getElementById('Telefon')->getAttribute('value'));
    }


}
