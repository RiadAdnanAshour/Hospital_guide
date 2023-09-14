<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('City.city', compact('cities'));
    }

    public function create()
    {
        return view('City.CreateCity');
    }

    public function store(Request $request)
    {
        City::create([
            'cityName' => $request->input('cityName'),

        ]);
        return redirect()->route('city.index');
    }

    public function edit(City $city)
    {
        return view('City.editCity', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $city->update([
            'cityName' => $request->input('cityName'),
        ]);
        return redirect()->route('city.index');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('city.index');
    }
}
