<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{
    public function show(City $city): View {
        return view('city-detail')->with('city', $city);
    }
}
