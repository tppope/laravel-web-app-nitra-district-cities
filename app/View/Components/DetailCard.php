<?php

namespace App\View\Components;

use App\Models\Address;
use App\Models\City;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailCard extends Component
{
    public Address $address;

    /**
     * Create a new component instance.
     */
    public function __construct(public City $city)
    {
        $this->address = $this->city->cityHallAddress;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.detail-card');
    }
}
