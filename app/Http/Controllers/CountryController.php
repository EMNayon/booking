<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{

    public function index(Request $request){

        if($request->ajax()){
            Log::info("hit");
            $data = Country::orderBy('name','asc')->get();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('created_at',function ($row){
                    return date('d M y',strtotime($row->created_at));
                })
                ->addColumn('action',function ($row){
                    return '<a class="btn btn-success text-white btn-sm" href="'.route('edit_country',[$row->id]).'">Edit</a>'.
                    ' <a class="btn btn-danger text-white btn-sm" href="'.route('delete_country',[$row->id]).'">Delete</a>';

                })
                ->make(true);
        }else{

            return view('admin.manage_hotel.countries');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_hotel.create_country');
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
        ]);

        DB::beginTransaction();
        try {
            Country::create([
                'name' => $request->country,
                'country_code' => $request->country_code,
                'currency_prefix' => $request->currency_prefix,
                'currency_icon' => $request->currency_icon
            ]);
            DB::commit();
            Session::flash('success','Country Added Successfully');
            return redirect()->route('country');
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
        $country = Country::find($request->route('id'));
        return view('admin.manage_hotel.edit_country', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $this->validate($request,[
            'country' => 'required',
            'id' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $country = Country::where('id', $request->id)->first();
            $country->name = $request->country;
            $country->save();
            DB::commit();
            Session::flash('success','Country Updated Successfully');
            return redirect()->route('country');
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
    public function destroy(Country $country)
    {

        DB::beginTransaction();
        try {
            $countryId = request()->route('id');
            Country::where('id' , $countryId)->delete();
            DB::commit();
            Session::flash('success','Country Deleted Successfully');
            return redirect()->route('country');
        }
        catch (\Exception $exception){

            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again');
            return redirect()->back();
        }

    }
}
