<?php

namespace App\Http\Controllers;

use App\Models\Agoda;
use App\Models\Booking;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Member;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $total_agent = User::where('user_type',User::USER_TYPE_USER)->count();
        $total_agent_request = User::where('user_type',User::USER_TYPE_USER)->where('status',User::STATUS_INACTIVE)->count();
        $total_submission = Member::count();
        $total_country = Country::count();
        $total_state = State::count();
        $total_hotel = Hotel::count();
        $booking = Booking::count();
        $agoda = Agoda::count();

        $total_booking_agoda = $booking + $agoda;
        // dd($total_country);
       return view('admin.home',compact('total_agent','total_agent_request','total_submission', 'total_country','total_state','total_hotel', 'total_booking_agoda', 'booking','agoda'));
    }
}
