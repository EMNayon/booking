<?php

namespace App\Http\Controllers;

use App\Models\Agoda;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AgodaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookingId = $this->generateBookingId();
        $bookingReferenceNo = $this->generateBookingReferenceNo();
        $memberId = $this->generateMemberId();
        $countries = Country::all();

        return view('user.home', compact('bookingId', 'bookingReferenceNo', 'memberId', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has enough points
        if ($user->point <= 0) {
            Session::flash('error', 'You do not have enough points to submit the form.');
            return redirect()->back();
        }

        $this->validate($request, [
            'booking_id' => 'required',
            'booking_reference_no'   => 'required',
            'member_id' => 'required',
            'client' => 'required',
            'country_of_residence' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'hotel' => 'required',
            'property_contact_number' => 'required',
            'number_of_rooms' => 'required',
            'number_of_extra_beds' => 'required',
            'number_of_adults' => 'required',
            'number_of_children' => 'required',
            'room_type' => 'required',
            'promotion' => 'required',
            'arrival' => 'required',
            'departure' => 'required'
        ]);


        DB::beginTransaction();
        try {

            Agoda::create([

                'booking_id' => $request->booking_id,
                'booking_reference_no'   => $request->booking_reference_no,
                'member_id' => $request->member_id,
                'client' => $request->client,
                'country_of_residence' => $request->country_of_residence,
                'hotel_id' => $request->hotel,
                'property_contact_number' => $request->property_contact_number,
                'number_of_rooms' => $request->number_of_rooms,
                'number_of_extra_beds' => $request->number_of_extra_beds,
                'number_of_adults' => $request->number_of_adults,
                'number_of_children' => $request->number_of_childer,
                'room_type' => $request->room_type,
                'promotion' => $request->promotion,
                'arrival' => $request->arrival,
                'departure' => $request->departure
            ]);

            DB::commit();
            Session::flash('success', 'File Submission Successfull.');
            return redirect()->back();
        } catch (\Exception $exception) {

            Log::error("exception occurred during stroing agoda user info " . $exception->getMessage());
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again letter');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agoda  $agoda
     * @return \Illuminate\Http\Response
     */
    public function show(Agoda $agoda, $id)
    {
        $agoda = Agoda::findOrFail($id);
        // dd($booking);
        // dd("i'm here");
        return view('user.agoda_file_submission_show', compact('agoda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agoda  $agoda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agoda $agoda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agoda  $agoda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agoda $agoda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agoda  $agoda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agoda $agoda, $id)
    {
        $agoda = Agoda::findOrFail($id);
        $agoda->delete();
        return redirect()->route('agoda_user_submission_list')->with('success', 'Agoda deleted successfully.');
    }

    public function getAllFileSubmissionList(Request $request)
    {
        // $agodas = Agoda::where('created_at', Auth::id())->orderBy('id', 'desc')->paginate(10);
        // dd($agodas);
        $agodas = Agoda::orderBy('id', 'desc')->paginate(10);

        return view('user.agoda_file_submission_list', compact('agodas'));
    }


    private function generateBookingId()
    {
        return $this->generateUniqueId(new Agoda(), 'booking_id');
    }

    private function generateBookingReferenceNo()
    {
        return $this->generateUniqueId(new Agoda(), 'booking_reference_no');
    }

    private function generateMemberId()
    {
        return $this->generateUniqueId(new Agoda(), 'member_id');
    }


    private function generateUniqueId($model, $column) {


        while(true)
        {
            $min = 1000000000;
            $max = 9999999999;
            $uniqueId = random_int($min, $max);

            $row = $model::where($column, $uniqueId)->first();

            if( $row == null)
            {
                return $uniqueId;
            }
        }

    }




}
