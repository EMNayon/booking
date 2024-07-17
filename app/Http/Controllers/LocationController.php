<?php
namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hotel;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $hotels = Hotel::where('state_id', $request->state_id)->get();
        return response()->json($hotels);
    }
    // public function fetchTax(Request $request)
    // {
    //     $tax = Hotel::where('hotel_id', $request->id)->get();
    //     return response()->json($tax);
    // }
}