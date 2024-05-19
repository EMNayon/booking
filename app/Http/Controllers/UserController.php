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

    public function userMemberEdit($code)
    {

        // $member = Member::where('code', $code)->first();
        dd('i am here');
        // $centers = self::$centers;
        // $destinations = self::$destinations;
        return view('user.member_edit', compact('member'));
    }
    public function userMemberUpdate(Request $request)
    {
        // $this->validate($request, [

        //     'name' => 'required',
        //     'dob' => 'required',
        //     'nationality' => 'required',
        //     'gender' => 'required',
        //     'passport' => ['nullable', Rule::unique('members')->ignore($request->id)]
        // ], [
        //     'name.required' => 'Name field is required',
        //     'dob.required' => 'Date of Birth field is required',
        //     'nationality.required' => 'Nationality field is required',
        //     'gender.required' => 'Gender field is required',
        // ]);
        DB::beginTransaction();

        try {
            $member = Member::find($request->id);

            $member->bin_no = $request->bin_no;
            $member->mushak = $request->mushak;
            $member->issuing_office = $request->issuing_office;
            $member->money_receipt_no = $request->money_receipt_no;
            $member->class_of_insurance = $request->class_of_insurance;
            $member->mode_of_payment = $request->mode_of_payment;
            $member->drawn_on = $request->drawn_on;

            $member->policy_no = $request->policy_no;
            $member->issue_date = $request->issue_date;
            $member->plan_type = $request->plan_type;
            $member->area_of_travel = $request->area_of_travel;
            $member->no_of_days_covered = $request->no_of_days_covered;
            $member->premium = $request->premium;
            $member->total_premium = $request->total_premium;
            $member->mr_no = $request->mr_no;


            $member->name = $request->name;
            $member->mobile_no = $request->mobile_no;
            $member->address = $request->address;
            $member->age = $request->age;
            $member->dob = date('d-m-Y', strtotime($request->dob));
            $member->pass_no = $request->pass_no;
            $member->nationality = $request->nationality;
            $member->save();
            DB::commit();
            Session::flash('success', 'Successfully Updated');
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again letter');
            return redirect()->back();
        }
    }
}
