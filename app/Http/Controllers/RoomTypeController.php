<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Hotel;
use App\Models\HotelRoomType;
use App\Models\RoomType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;



class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            Log::info("hit");
            $data = RoomType::orderBy('title', 'asc')->get();

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('created_at', function ($row) {
                    return date('d M y', strtotime($row->created_at));
                })
                ->addColumn('action', function ($row) {
                    return '<a class="btn btn-success text-white btn-sm" href="' . route('edit_room_type', [$row->id]) . '">Edit</a>';
                    // ' <a class="btn btn-danger text-white btn-sm" href="' . route('delete_room_type', [$row->id]) . '">Delete</a>';
                })
                ->make(true);
        } else {

            return view('admin.manage_hotel.room_types.room_types');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage_hotel.room_types.create_room_type');
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
            'title' => 'required',
        ]);

        DB::beginTransaction();
        try {
            RoomType::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            DB::commit();
            Session::flash('success', 'Room Type Added Successfully');
            return redirect()->route('room_types');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $roomType = RoomType::find($request->route('id'));
        return view('admin.manage_hotel.room_types.edit_room_type', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomType $roomType)
    {

        $this->validate($request, [
            'title' => 'required',
            'id' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $roomType = RoomType::where('id', $request->id)->first();
            $roomType->title = $request->title;
            $roomType->description = $request->description;
            $roomType->save();
            DB::commit();
            Session::flash('success', 'Room Type Updated Successfully');
            return redirect()->route('room_types');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $roomType)
    {
        //
    }

    public function addRoomType(Request $request, $id)
    {
        $room_types = RoomType::all();
        $hotel = Hotel::find($id);

        if($hotel == null)
        {

        }
        return view('admin.manage_hotel.room_types.assign_room_type',compact('room_types', 'hotel'));
    }

    public function assignRoomType(Request $request)    {

        $this->validate($request, [
            'hotel_id' => 'required',
            'room_price_per_night' => 'required',
            'room_type' => 'required'
        ]);

        DB::beginTransaction();
        try {

            $hasAvailable = HotelRoomType::where([
                'hotel_id' => $request->hotel_id,
                'room_type_id' => $request->room_type
            ])->first();

            if($hasAvailable != null)
            {
                Session::flash('error', 'Room Type is already assigned');
                return redirect()->back();
            }


            HotelRoomType::create([
                'hotel_id' => $request->hotel_id,
                'room_price_per_night' => $request->room_price_per_night,
                'room_type_id' => $request->room_type,
            ]);

            Hotel::where('id', $request->hotel_id)->update(['status' => 1]);
            DB::commit();
            Session::flash('success', 'Room Type Assigned Successfully');
            return redirect()->route('hotel');
        } catch (\Exception $exception) {

            Log::error($exception->getMessage());
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again');
            return redirect()->back();
        }
    }

    public function roomTypeListOfHotel(Request $request, $id)
    {


        try {
            $hotel = Hotel::find($id);

            if ($hotel == null) {
                return redirect()->route('hotel');
            }
            $result = DB::table('hotel_room_type')
            ->join('room_types', 'hotel_room_type.room_type_id', 'room_types.id')
            ->where('hotel_id', $hotel->id)
            ->get();

            // $packageInfos = HotelRoomType::with(['roomTypes'])->where('hotel_id', $id)->get();

            return view('admin.manage_hotel.room_types.room_type_of_hotel', compact('hotel', 'result'));
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            Log::error($exception->getMessage());
            DB::rollBack();
            Session::flash('error', 'Something went wrong. Please try again');
            return redirect()->back();
        }
    }


    public function fetchRoomTypes(Request $request)
    {
        try{

            $result = DB::table('hotel_room_type')
            ->where('hotel_id', $request->hotel_id)
            ->join('room_types', 'hotel_room_type.room_type_id', '=', 'room_types.id')
            ->get();
            
            return response()->json($result);

        }catch(Exception $e)
        {
            Log::error($e->getMessage());
            return redirect()->back();
        }
    }
}
