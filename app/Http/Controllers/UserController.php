<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        return view('user.home', ['destinations' => MemberController::$destinations]);
    }
    public function getAllFileSubmissionList(Request $request)
    {
        $members = Member::where('created_by', Auth::id())->orderBy('id', 'desc')->paginate(10);
        // dd($members);

        return view('user.file_submission_list', compact('members'));
    }

    public function getMemberDataByCode($code)
    {
        $member = Member::where('code', $code)->first();
        dd($member);
        return view('user.file_submission_show', compact('member'));
    }
}
