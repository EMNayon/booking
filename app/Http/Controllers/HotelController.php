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


        if($request->ajax()){
            $data = Hotel::orderBy('name','asc')->get();
            Log::info($data);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at',function ($row){
                    return date('d M y',strtotime($row->created_at));
                })
                ->addColumn('action',function ($row){
                    return '<a class="btn btn-success text-white btn-sm" href="'.route('edit_hotel',[$row->id]).'">Edit</a>'.
                    ' <a class="btn btn-danger text-white btn-sm" href="'.route('delete_hotel',[$row->id]).'">Delete</a>';

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
        $this->validate($request,[
            'country' => 'required',
            'state'   => 'required',
            'city' => 'required'
        ]);

        DB::beginTransaction();
        try {

            city::create([
                'name' => $request->city,
                'state_id' => $request->state
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
        $inputCityId = $request->route('id');

        $oldCity = City::where('id', $inputCityId)->first();

        if($oldCity == null)
        {
            Session::flash('error','Invalid Hotel to Edit');
            return redirect()->back();
        }
        $oldState = State::where('id', $oldCity->state_id)->first();
        $oldCountry = Country::where('id', $oldState->country_id)->first();
        $countries = Country::all();
        $states = State::where('country_id', $oldCountry->id)->get();

        return view('admin.manage_hotel.hotel.edit_hotel', compact('oldCountry', 'oldState', 'oldCity', 'countries', 'states'));
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
    public function destroy(City $city)
    {

        DB::beginTransaction();
        try {
            $cityId = request()->route('id');
            City::where('id' , $cityId)->delete();
            DB::commit();
            Session::flash('success','Hotel Deleted Successfully');
            return redirect()->route('hotel');
        }
        catch (\Exception $exception){

            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again');
            return redirect()->back();
        }

    }
}
