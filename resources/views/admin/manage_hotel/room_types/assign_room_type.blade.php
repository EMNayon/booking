@extends('layouts.admin')
@section('title','Assign Room Type')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card mb-4 mt-3">
                    <div class="card-body text-center">
                        <form action="{{route('assign_room_type')}}" method="post">
                            @csrf
                            {{-- <input type="hidden" name="id" value="{{$user->id}}"> --}}
                            <h1 class="h3 mb-3 fw-normal">Assign Room Type</h1>

                            @if(\Illuminate\Support\Facades\Session::has('error'))
                                <div class="alert alert-danger alert-dismissible pb-2" role="alert">
                                    {{\Illuminate\Support\Facades\Session::get('error')}}
                                </div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success alert-dismissible pb-2" role="alert">
                                    {{\Illuminate\Support\Facades\Session::get('success')}}
                                </div>
                            @endif

                            <input type="text" class="form-control" id="hotel_id" name="hotel_id" value={{$hotel->id}} hidden>

                             <div class="form-floating mt-2">
                                <select class="form-control" id="room_type" name="room_type" aria-label="room_type" required>
                                    <option value="">Select Room Type</option>
                                    @foreach ($room_types as $room_type)
                                        <option name="room_type" value={{ $room_type->id }}>{{ $room_type->title }}</option>
                                    @endforeach
                                </select>
                                <label for="room_type">Room Type</label>
                                @error('room_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="room_price_per_night" name="room_price_per_night"
                                    placeholder="Add Hotel Price" required>
                                <label for="room_price_per_night">Hotel Price ( Per Night ) </label>
                                @error('room_price_per_night')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <button class="w-100 btn btn-lg btn-success mt-2" type="submit">Assign Room Type</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

