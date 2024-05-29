<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Hotel;

class LocationController extends Controller
{
    public function fetchStates(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->get();
        return response()->json($states);
    }

    public function fetchCities(Request $request)
    {
        $cities = City::where('state_id', $request->state_id)->get();
        return response()->json($cities);
    }

    public function fetchHotels(Request $request)
    {
        $hotels = Hotel::where('city_id', $request->city_id)->get();
        return response()->json($hotels);
    }
}
