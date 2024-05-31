@extends('layouts.user')
@section('title', 'Online Booking')
@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <style>
        label {
            color: white;
        }

        select option {
            color: black;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                    <span><b> Success - </b> {{ \Illuminate\Support\Facades\Session::get('success') }}</span>
                </div>
            @endif
            @if (\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                    <span><b> Failed - </b> {{ \Illuminate\Support\Facades\Session::get('error') }}</span>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h3 class="text-left" style="font-weight: bold; margin-left: 10px;">Booking</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">

                            <div class="col-sm-12 ">
                                <label for="confirmation_no">Confirmation No </label>
                                <input type="text" class="form-control text-white" id="confirmation_no"
                                    name="confirmation_no" placeholder="Confirmation No" value="{{ $booking->confirmation_number }}"
                                    readonly>
                                @error('confirmation_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="pin_code">Pin Code </label>
                                <input type="text" class="form-control text-white" id="pin_code" name="pin_code"
                                    placeholder="Pin Code" value="{{ $booking->pin_code }}" readonly>
                                @error('pin_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="country">Country</label>
                                <input type="text" class="form-control text-white" id="pin_code" name="pin_code"
                                    placeholder="Pin Code" value="{{ $booking->hotel->city->state->country->name }}" readonly>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                               <div class="col-sm-12">
                                <label for="state">State</label>
                                <input type="text" class="form-control text-white" id="confirmation_no"
                                name="confirmation_no" placeholder="Confirmation No" value="{{ $booking->hotel->city->state->name }}"
                                readonly>
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-sm-12">
                                <label for="city">City</label>
                                <input type="text" class="form-control text-white" id="confirmation_no"
                                name="confirmation_no" placeholder="Confirmation No" value="{{ $booking->hotel->city->name }}"
                                readonly>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-sm-12">
                                <label for="hotel">Hotel</label>
                                <input type="text" class="form-control text-white" id="confirmation_no"
                                name="confirmation_no" placeholder="Confirmation No" value="{{ $booking->hotel->name }}"
                                readonly>
                                @error('hotel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="rooms">Rooms</label>
                                <input type="text" class="form-control text-white" id="rooms" name="rooms" placeholder="Room"
                                    value="{{ $booking->rooms }}" readonly>
                                @error('rooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="nights">Nights</label>
                                <input type="text" class="form-control text-white" id="nights" name="nights"
                                    placeholder="Nights" value="{{ $booking->nights }}" readonly>
                                @error('nights')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="phone">Phone </label>
                                <input type="text" class="form-control text-white" id="phone" name="phone"
                                    placeholder="Phone Number" value="{{$booking->phone}}" readonly>
                                {{-- value="{{ rand(100000000000, 9999999999) }} --}}
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            {{-- <h3 class="text-left" style="font-weight: bold">Insurance Details</h3> --}}


                            <div class="col-sm-12 ">
                                <label for="check_in">Check In </label>
                                <input type="text" class="form-control text-white" id="check_in" name="check_in"
                                    placeholder="Check In" value="{{ $booking->check_in }}" readonly>
                                @error('check_in')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="check_out">Check Out </label>
                                <input type="text" class="form-control text-white" id="check_out" name="check_out"
                                    placeholder="Check Out" value="{{ $booking->check_out }}" readonly>
                                @error('check_out')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="guest_name">Guest Name</label>
                                <input type="text" class="form-control text-white" id="guest_name" name="guest_name"
                                    placeholder="Guest Name" value="{{ $booking->guest_name }}" readonly>
                                @error('guest_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="delux_room">Delux Room</label>
                                <input type="text" class="form-control text-white" id="delux_room" name="delux_room"
                                    placeholder="Delux Room" value="{{ $booking->deluxe_room }}" readonly>
                                @error('delux_room')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="tax">Tax</label>
                                <input type="text" class="form-control text-white" id="tax" name="tax"
                                    placeholder="Tax" value="15%" readonly>
                                @error('tax')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="price">Price </label>
                                <input type="text" class="form-control text-white" id="price" name="price"
                                    placeholder="Price" value="{{ $booking->price }}" readonly>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="total_price">Total Price </label>
                                <input type="text" class="form-control text-white" id="total_price" name="total_price"
                                    placeholder="total_price" value="{{ $booking->total_price }}" readonly>
                                @error('total_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
