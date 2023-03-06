<?php

namespace App\Http\Livewire;

use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Livewire\Component;

class SearchBox extends Component
{
    public $search = '';

    protected $queryString = ['search' => ['except' => '']];

    public function render()
    {
        $cities = $this->search ? City::search($this->search)->pluck('name', 'id') : Collection::make();
        return view('livewire.search-box', [
            'cities' => $cities
        ]);
    }

    public function showCity(int $id)
    {
        return redirect()->to("/city/$id");
    }
}
