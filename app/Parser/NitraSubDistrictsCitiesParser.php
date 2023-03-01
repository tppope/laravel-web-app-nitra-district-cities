<?php

namespace App\Parser;

use App\Models\Address;
use App\Models\City;
use DOMNode;
use Illuminate\Bus\Batch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NitraSubDistrictsCitiesParser extends ParserAbstract implements ParserInterface
{

    public function parseAndImport(Collection $urls): Batch|null
    {
        $this->importCities($urls);

        return null;
    }

    private function importCities(Collection $citiesUrls)
    {
        $citiesUrls->each(function ($cityUrl, $cityName) {
            $this->loadHtmlDom($cityUrl);

            $this->importCity($cityName);
        });
    }

    private function importCity(string $cityName)
    {
        $editCityUrl = collect($this->dom?->getElementById('telo')?->getElementsByTagName('img')->getIterator())
            ->first(fn(DOMNode $node) => Str::contains($node->attributes->getNamedItem('src')->textContent, '/images/edit2.jpg'))
            ->parentNode->attributes->getNamedItem('href')->textContent;

        $this->loadHtmlDom($editCityUrl);

        parse_str(parse_url($editCityUrl)['query'], $query);

        Storage::disk('public')->put($query['id'] . '.png', file_get_contents($this->getCoatOfArmsImageUrl()));


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
                'coat_of_arms_image_path' => Storage::path($query['id'] . '.png'),
                'city_hall_address_id' => $cityHallAddress->id
            ]);
    }

    private function getCoatOfArmsImageUrl(): string
    {
        return collect($this->dom->getElementsByTagName('img')->getIterator())
            ->map(fn(DOMNode $node) => $node->attributes->getNamedItem('src')->textContent)
            ->first(fn(string $url) => Str::contains($url, '/erb.php'));
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
