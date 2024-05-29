<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirmationNo = "134";
        $pinCode = '134';
        $countries = Country::all();

        return view('user.booking', compact('confirmationNo', 'pinCode', 'countries'));
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
            "confirmation_no" => "required",
            "pin_code"        => "required",
            "country"         => "required",
            "state"           => "required",
            "city"            => "required",
            "hotel"           => "required",
            "rooms"           => "required",
            "nights"          => "required",
            "phone"           => "required",
            "check_in"        => "required",
            "check_out"       => "required",
            "guest_name"      => "required",
            "delux_room"      => "required",
            "tax"             => "required",
            "price"           => "required"
        ]);


        DB::beginTransaction();
        try {

            Booking::create([
                "confirmation_number" => $request->confirmation_no,
                "pin_code"        => $request->pin_code,
                "hotel_id"           => $request->hotel,
                "rooms"           => $request->rooms,
                "nights"          => $request->nights,
                "phone"           => $request->phone,
                "check_in"        => $request->check_in,
                "check_out"       => $request->check_out,
                "guest_name"      => $request->guest_name,
                "delux_room"      => $request->delux_room,
                "tax"             => 15,
                "price"           => $request->price
            ]);

            DB::commit();
            Session::flash('success', 'File Submission Successfull.');
            return redirect()->back();
        } catch (\Exception $exception) {
           dd($exception->getMessage());
            Log::error("exception occurred during stroing booking user info " . $exception->getMessage());
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again letter');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
