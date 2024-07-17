<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Country;
use App\Models\Hotel;
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
        $confirmationNo = $this->generateConfirmationNumber();
        $pinCode        = $this->generatePinCode();
        $countries      = Country::all();
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


    public function store(Request $request)
    {

          // Get the authenticated user
        $user = Auth::user();

          // Check if the user has enough points
        if ($user->point <= 0) {
            Session::flash('error', 'You do not have enough points to submit the form.');
            return redirect()->back();
        }


        $taxRate = $request->tax;
        $taxRate = trim($taxRate, "% ");
        $taxRate = (float) $taxRate / 100;
        $price       = $request->total_price;
        $tax         = $price * $taxRate;
        $total_price = $price + $tax;
 
        
        DB::beginTransaction();
        try {

            Booking::create([
                "confirmation_number" => $request->confirmation_no,
                "pin_code"            => $request->pin_code,
                "hotel_id"            => $request->hotel,
                "rooms"               => $request->rooms,
                "nights"              => $request->nights,
                "phone"               => $request->phone,
                "check_in"            => $request->check_in,
                "check_out"           => $request->check_out,
                "guest_name"          => $request->guest_name,
                "room_type"         => $request->room_type,
                'tax'                 => $taxRate,
                'price'               => $price,
                'total_price'         => $total_price
            ]);


            $user->point -= 1;
            $user->save();

            DB::commit();
            Session::flash('success', 'File Submission Successfull.');
            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error("exception occurred during stroing booking user info " . $exception->getMessage());
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again letter');
            return redirect()->back();
        }
    }


    public function show(Booking $booking, $id)
    {
        $booking = Booking::findOrFail($id);
          // dd($booking);
          // dd("i'm here");
        return view('user.booking_file_submission_show', compact('booking'));
    }


    public function edit(Booking $booking)
    {
          //
    }


    public function update(Request $request, Booking $booking)
    {
          //
    }

    public function destroy(Booking $booking, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('booking_user_submission_list')->with('success', 'Booking deleted successfully.');
    }


    public function getAllFileSubmissionList(Request $request)
    {
        $bookings = Booking::orderBy('id', 'desc')->paginate(10);
        return view('user.booking_file_submission_list', compact('bookings'));
    }




    private function generateConfirmationNumber()
    {
        return $this->generateUniqueId(new Booking(), 'confirmation_number');
    }

    private function generatePinCode()
    {
        return $this->generateUniquePinCode(new Booking(), 'pin_code');
    }
    private function generateUniquePinCode($model, $column) {
        while(true)
        {
            $min      = 1000;
            $max      = 9999;
            $uniqueId = random_int($min, $max);
            $row      = $model::where($column, $uniqueId)->first();

            if( $row == null)
            {
                  // $formattedId = substr($uniqueId, 0, 4) . '.' . substr($uniqueId, 4, 3) . '.' . substr($uniqueId, 7, 3);
                return $uniqueId;
            }
        }

    }
    private function generateUniqueId($model, $column) {
        while(true)
        {
            $min      = 1000000000;
            $max      = 9999999999;
            $uniqueId = random_int($min, $max);
            $row      = $model::where($column, $uniqueId)->first();

            if( $row == null)
            {
                $formattedId = substr($uniqueId, 0, 4) . '.' . substr($uniqueId, 4, 3) . '.' . substr($uniqueId, 7, 3);
                return $formattedId;
            }
        }

    }

    public function getPricePerNight(Request $request)
    {
        $hotelId = $request->id;
        $hotel   = Hotel::findOrFail($hotelId);
          // dd($hotel);
        return response()->json([
            'price_per_night' => $hotel->hotel_price_per_night,
        ]);
    }



}