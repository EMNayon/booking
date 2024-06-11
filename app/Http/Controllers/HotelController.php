<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\City;
use DataTables;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class HotelController extends Controller
{
    public function index(Request $request){

        $cityNames = City::pluck('name', 'id')->toArray();
        // $stateNames = State::pluck('name', 'id')->toArray();
        // $countryNames = Country::pluck('name', 'id')->toArray();

        if($request->ajax()){
            $data = Hotel::orderBy('name','asc')->get();
            Log::info(gettype($data));
            $finalData = [];

            foreach($data as $singleData)
            {
                $temp = [
                    'id' => $singleData->id,
                    'name' => $singleData->name,
                    'longitude' => $singleData->longitidue,
                    'latitdue' => $singleData->latidude,
                    'created_at' => $singleData->created_at,
                    'updated_at' => $singleData->updated_at
                ];
                $city = City::where('id', $singleData->city_id)->first();
                $temp['city'] = $city->name;

                $state = State::where('id', $city->state_id)->first();
                $temp['state'] = $state->name;

                $country = Country::where('id', $state->country_id)->first();
                $temp['country'] = $country->name;
                $finalData[] = (object) $temp;
            }
            Log::info($finalData);

            return DataTables::of($finalData)
                ->addIndexColumn()
                ->addColumn('created_at',function ($row){
                    return date('d M y',strtotime($row->created_at));
                })
                // ->addColumn('action',function ($row){
                //     return '<a class="btn btn-success text-white btn-sm" href="'.route('edit_hotel',[$row->id]).'">Edit</a>'.
                //     ' <a class="btn btn-danger text-white btn-sm" href="'.route('delete_hotel',[$row->id]).'">Delete</a>';

                // })
                ->addColumn('action', function ($row) {
                    return '<a class="btn btn-success text-white btn-sm" href="'.route('edit_hotel', [$row->id]).'">Edit</a>' .
                       ' <button class="btn btn-danger text-white btn-sm delete-btn" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>';
                })

                ->make(true);
        }else{

            return view('admin.manage_hotel.hotel.hotels');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.manage_hotel.hotel.create_hotel', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info("storing hotel info "  . json_encode($request->all()));

        DB::beginTransaction();
        try {
            // dd($request->hasFile('hotel_image'));
            if ($request->hasFile('hotel_image')) {
                // dd("i'm here");
                $image = $request->file('hotel_image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/hotels'), $imageName);
            }

            if ($request->hasFile('google_map_image')) {
                // dd("i'm here");
                $image = $request->file('google_map_image');
                $googleMapImage = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/hotels'), $googleMapImage);
            }
            // Extract longitude and latitude from google_map_add
            $googleMapAdd = $request->google_map_add;
            list($latitude, $longitude) = $this->extractLatLong($googleMapAdd);


            Hotel::create([
                'name' => $request->hotel,
                'city_id' => $request->city,
                'longitude' => $longitude,
                'latitude' => $latitude,
                'google_map_add' => $googleMapAdd,
                'hotel_tax' => $request->hotel_tax,
                'hotel_type' => $request->hotel_type,
                'hotel_price_per_night' => $request->hotel_price_per_night,
                'hotel_image' => isset($imageName) ? 'images/hotels/'.$imageName : null,
                'google_map_image' => isset($googleMapImage) ? 'images/hotels/'.$googleMapImage : null

            ]);

            DB::commit();
            Session::flash('success','Hotel Added Successfully');
            return redirect()->route('hotel');
        }
        catch (\Exception $exception){
            Log::error("exception occurred during storing hotel => " . $exception->getMessage());
            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $inputHotelId = $request->route('id');

        $oldHotel = Hotel::where('id', $inputHotelId)->first();

        if($oldHotel == null)
        {
            Session::flash('error','Invalid Hotel to Edit');
            return redirect()->back();
        }

        $oldCity = City::where('id', $oldHotel->city_id)->first();
        $oldState = State::where('id', $oldCity->state_id)->first();
        $oldCountry = Country::where('id', $oldState->country_id)->first();
        $countries = Country::all();
        $states = State::where('country_id', $oldCountry->id)->get();
        $cities = City::where('state_id', $oldState->id)->get();



        return view('admin.manage_hotel.hotel.edit_hotel', compact('oldCountry', 'oldState', 'oldCity', 'countries', 'states', 'cities', 'oldHotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request,[
            'old_city' => 'required',
            'country'  => 'required',
            'state'    => 'required',
            'city'     => 'required'
        ]);

        DB::beginTransaction();
        try {
            $city = City::find($request->old_city);
            $city->state_id = $request->state;
            $city->name = $request->city;
            $city->save();

            DB::commit();
            Session::flash('success','Hotel Updated Successfully');
            return redirect()->route('hotel');
        }
        catch (\Exception $exception){
            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        // dd('okay');
        DB::beginTransaction();
        try {
            $hotelId = request()->route('id');
            // dd($hotelId);
            Hotel::where('id' , $hotelId)->delete();
            DB::commit();
            Session::flash('success','Hotel Deleted Successfully');
            return response()->json(['success' => true]);
        }
        catch (\Exception $exception){

            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again');
            return response()->json(['success' => false], 404);
        }

    }


    private function extractLatLong($googleMapAdd)
{
    // Assuming the google_map_add is in the format "latitude,longitude"
    $coords = explode(',', $googleMapAdd);

    if(count($coords) !== 2) {
        throw new \Exception('Invalid Google Map address format. Expected "latitude,longitude".');
    }

    return [$coords[0], $coords[1]];
}
}
