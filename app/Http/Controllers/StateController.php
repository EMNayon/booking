<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class StateController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = State::orderBy('name', 'asc')->get();
            Log::info($data);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return date('d M y', strtotime($row->created_at));
                })
                ->addColumn('action', function ($row) {
                    return '<a class="btn btn-success text-white btn-sm" href="' . route('edit_state', [$row->id]) . '">Edit</a>';
                })
                ->make(true);
        } else {

            return view('admin.manage_hotel.state.states');
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

        return view('admin.manage_hotel.state.create_state', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'country' => 'required',
            'state' => 'required',
        ]);

        DB::beginTransaction();
        try {

            State::create([
                'name' => $request->state,
                'country_id' => $request->country,
            ]);

            DB::commit();
            Session::flash('success', 'State Added Successfully');
            return redirect()->route('state');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again');
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
        $this->validate($request, [
            'country' => 'required',
            'id' => 'required',
            'state' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $state = State::find($request->id);
            $state->country_id = $request->country;
            $state->name = $request->state;
            $state->save();
            DB::commit();
            Session::flash('success', 'State Updated Successfully');
            return redirect()->route('state');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again');
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
            State::where('id', $stateId)->delete();
            DB::commit();
            Session::flash('success', 'State Deleted Successfully');
            return redirect()->route('state');
        } catch (\Exception $exception) {

            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again');
            return redirect()->back();
        }
    }

    public function fetchStates(Request $request)
    {
        Log::info($request->country);

        $content = '
            <div class="form-floating mt-2">
            <select class="form-control state-select" id="state" name="state" aria-label="State" required>
                <option value="">Select State</option>';

        Log::info(['country' => $request->country]);
        $states = State::where('country_id', $request->country)->get();

        if ($states->count() <= 0) {
            return '<div class="mt-2"><span class="text-danger">No State Found</span></div>';
        }

        foreach ($states as $state) {
            $content .= '<option name="state" value="'. $state->id . '">'.   $state->name   .'</option>';
        }
        $content .= '</select>';
        return $content;

    }
}
