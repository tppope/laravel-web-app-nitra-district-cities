<?php

namespace App\Parser;

use App\Jobs\ParseNitraDistrictCities;
use DOMNode;
use Illuminate\Bus\Batch;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Str;

class NitraDistrictCityParser extends ParserAbstract implements ParserInterface
{

    public function parseAndImport(Collection $urls): Batch|null
    {
        $batch = Bus::batch([])->dispatch();

        $urls->each(function (string $url) use ($batch) {
            $this->loadHtmlDom($url);

            $allSubDistrictsUrls = $this->getAllSubDistrictsUrls();
            $allSubDistrictsUrls->each(function (string $subDistrictUrl) use ($batch) {
                $this->loadHtmlDom($subDistrictUrl);

                $allSubDistrictsCitiesUrls = $this->getAllSubDistrictsCitiesUrls();

                $batch->add(new ParseNitraDistrictCities($allSubDistrictsCitiesUrls));

            });
        });


        return $batch;
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


}
