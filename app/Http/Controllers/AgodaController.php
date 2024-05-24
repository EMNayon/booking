<?php

namespace App\Http\Controllers;

use App\Models\Agoda;
use Illuminate\Http\Request;

class AgodaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.home');
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
         // dd('ok');
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has enough points
        if ($user->point <= 0) {
            Session::flash('error', 'You do not have enough points to submit the form.');
            return redirect()->back();
        }

        DB::beginTransaction();
        try {
            $code = $this->generateCode();
            $agoda = new Agoda();

            dd($agoda);


            $member->save();

            // Decrement the user's points
            $user->point -= 1;
            $user->save();

            DB::commit();
            Session::flash('success', 'File Submission Successfull.');
            return redirect()->back();
        } catch (\Exception $exception) {
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
    public function show(Agoda $agoda)
    {
        //
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
    public function destroy(Agoda $agoda)
    {
        //
    }
}
