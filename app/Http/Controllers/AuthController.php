<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    // public function login(Request $request){
    //     $this->validate($request,[
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);
    //     if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
    //         // dd('i am here');

    //         if(Auth::user()->user_type == User::USER_TYPE_USER){
    //             if( Auth::user()->status == User::STATUS_ACTIVE){
    //                 Session::flash('success','Agent Successfully Login');
    //                 return redirect()->route('user.home');
    //             }else{
    //                 Auth::logout();
    //                 Session::flash('error','Your Account now is on pending.');
    //                 return redirect()->route('login');
    //             }
    //         }

    //         if(Auth::user()->user_type == User::USER_TYPE_ADMIN){
    //             Session::flash('success','Admin Successfully Login');
    //             return redirect()->route('admin.home');
    //         }
    //         else{
    //             Auth::logout();
    //             return redirect()->route('login');
    //         }
    //     }
    //     else{
    //         Session::flash('error','Email and password do not match.');
    //         return redirect()->back();
    //     }
    // }

    public function login(Request $request){

        try {
            $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::user()->user_type == User::USER_TYPE_USER) {
                    if (Auth::user()->status == User::STATUS_ACTIVE) {
                        Session::flash('success', 'Agent Successfully Login');
                        return redirect()->route('user.home');
                    } else {
                        Auth::logout();
                        Session::flash('error', 'Your Account now is on pending.');
                        return redirect()->route('login');
                    }
                }

                if (Auth::user()->user_type == User::USER_TYPE_ADMIN) {
                    Session::flash('success', 'Admin Successfully Login');
                    return redirect()->route('admin.home');
                } else {
                    Auth::logout();
                    return redirect()->route('login');
                }
            } else {
                Session::flash('error', 'Email and password do not match.');
                return redirect()->back();
            }
        } catch (\Exception $e) {

            // Log the exception or handle it according to your application's requirements
            dd($e->getMessage()); // For debugging purposes, you can display the exception message
        }
    }


    public function showSignupForm(){
        return view('auth.signup');
    }

    public function signup(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->user_type = User::USER_TYPE_USER;
            $user->status = User::STATUS_INACTIVE;
            $user->save();
            DB::commit();

            Session::flash('success','Agent Successfully Registered');
            return redirect()->route('signup');

        }
        catch (\Exception $exception){
            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again');
            return redirect()->back();
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function showChangePasswordForm($id){
        $user = User::find($id);
        return view('auth.change_password',compact('user'));
    }

    public function submitChangePasswordForm(Request $request){
        $this->validate($request,[
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        DB::beginTransaction();
        try {
            $user = User::find($request->id);
            $user->password = Hash::make($request->password);
            $user->save();
            DB::commit();
            Session::flash('success','Password Successfully Changed');
            return redirect()->back();
        }
        catch (\Exception $exception){
            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again');
            return redirect()->back();
        }
    }
}
