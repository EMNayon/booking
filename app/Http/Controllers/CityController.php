<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use DataTables;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    public function index(Request $request){


        if($request->ajax()){
            $data = City::orderBy('name','asc')->get();
            Log::info($data);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at',function ($row){
                    return date('d M y',strtotime($row->created_at));
                })
                ->addColumn('action',function ($row){
                    return '<a class="btn btn-success text-white btn-sm" href="'.route('edit_city',[$row->id]).'">Edit</a>'.
                    ' <a class="btn btn-danger text-white btn-sm" href="'.route('delete_city',[$row->id]).'">Delete</a>';

                })
                ->make(true);
        }else{

            return view('admin.manage_hotel.city.cities');
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
        $states = State::all();
        

        return view('admin.manage_hotel.city.create_city', compact('countries', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
            Session::flash('success','State Added Successfully');
            return redirect()->route('state');
        }
        catch (\Exception $exception){
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
        $state = State::find($request->route('id'));
        $countries = Country::all();


        return view('admin.manage_hotel.state.edit_state', compact('countries', 'state'));
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
            'country' => 'required',
            'id'      => 'required',
            'state'   => 'required'
        ]);

        DB::beginTransaction();
        try {
            $state = State::find($request->id);
            $state->country_id = $request->country;
            $state->name = $request->state;
            $state->save();
            DB::commit();
            Session::flash('success','State Updated Successfully');
            return redirect()->route('state');
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
    public function destroy(State $state)
    {

        DB::beginTransaction();
        try {
            $stateId = request()->route('id');
            State::where('id' , $stateId)->delete();
            DB::commit();
            Session::flash('success','State Deleted Successfully');
            return redirect()->route('state');
        }
        catch (\Exception $exception){

            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again');
            return redirect()->back();
        }

    }
}
