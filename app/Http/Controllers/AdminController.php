<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $total_agent = User::where('user_type',User::USER_TYPE_USER)->count();
        $total_agent_request = User::where('user_type',User::USER_TYPE_USER)->where('status',User::STATUS_INACTIVE)->count();
        $total_submission = Member::count();
       return view('admin.home',compact('total_agent','total_agent_request','total_submission'));
    }
}
