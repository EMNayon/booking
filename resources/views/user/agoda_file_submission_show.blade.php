@extends('layouts.user')
@section('title', 'Add New Insurance')
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
            <h3 class="text-left" style="font-weight: bold; margin-left: 10px;">Agoda</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="booking_id">Booking ID </label>
                                <input type="text" class="form-control text-white" id="booking_id"
                                    name="booking_id" placeholder="Booking ID"
                                    " value="{{$agoda->booking_id}}" readonly>
                                    {{-- value="{{ rand(100000000000, 9999999999) }} --}}
                                @error('booking_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="booking_reference_no">Booking Reference No </label>
                                <input type="text" class="form-control text-white" id="booking_reference_no" name="booking_reference_no"
                                    placeholder="Booking Reference No" value="{{ $agoda->booking_reference_no }}" readonly>
                                @error('booking_reference_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="client">Client </label>
                                <input type="text" class="form-control text-white" id="client" name="client"
                                    placeholder="Client" value="{{ $agoda->client }}" readonly>
                                @error('client')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="member_id">Member ID</label>
                                <input type="text" class="form-control text-white" id="member_id" name="member_id"
                                    placeholder="Member ID" value="{{ $agoda->member_id }}" readonly>
                                @error('member_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="country_of_residence">Country of Residence</label>
                                <input type="text" class="form-control text-white" id="country_of_residence" name="country_of_residence"
                                    placeholder="Country of Residence" value="{{ $agoda->country_of_residence }}" readonly>
                                @error('country_of_residence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="property">Property </label>
                                <input type="text" class="form-control text-white text-white" id="property" name="property"
                                    placeholder="Property" value="{{$agoda->hotel->name}}"  readonly>
                                @error('property')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="address">Address </label>
                                <input type="text" class="form-control text-white text-white" id="drawn_on" name="drawn_on"
                                    placeholder="Drawn On"  value="{{$agoda->hotel->city->name}} , {{$agoda->hotel->city->state->name}} , {{$agoda->hotel->city->state->country->name}}" readonly>
                                @error('drawn_on')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="arrival">Arrival </label>
                                <input type="text" class="form-control text-white text-white" id="arrival" name="arrival"
                                    placeholder="Arrival" value="{{$agoda->arrival}}"  readonly>
                                @error('arrival')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="price"> Price</label>
                                <input type="text" class="form-control text-white" id="price" name="price"
                                    placeholder="Departure" value="{{ $agoda->price }}" readonly>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            {{-- <h3 class="text-left" style="font-weight: bold">Insurance Details</h3> --}}


                            <div class="col-sm-12 ">
                                <label for="property_contact_number">Property Contact Number</label>
                                <input type="text" class="form-control text-white text-white" id="property_contact_number" name="property_contact_number"
                                    placeholder="Property Contact Number" value="{{$agoda->property_contact_number}}" readonly>
                                @error('property_contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="number_of_rooms">Number of Rooms</label>
                                <input type="text" class="form-control text-white text-white" id="number_of_rooms" name="number_of_rooms"
                                    placeholder="Number of rooms" value="{{$agoda->number_of_rooms}}" readonly>
                                @error('number_of_rooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="number_of_extra_beds">Number of Extra Beds</label>
                                <input type="text" class="form-control text-white" id="number_of_extra_beds" name="number_of_extra_beds"
                                    placeholder="Number of Extra Beds" value="{{ $agoda->number_of_extra_beds }}" readonly>
                                @error('number_of_extra_beds')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="number_of_adults">Number of Adults</label>
                                <input type="text" class="form-control text-white" id="number_of_adults" name="number_of_adults"
                                    placeholder="Number of Adults" value="{{ $agoda->number_of_adults }}" readonly>
                                @error('number_of_adults')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="number_of_children">Number of Children</label>
                                <input type="text" class="form-control text-white" id="number_of_children" name="number_of_children"
                                    placeholder="Number of Children" value="{{ $agoda->number_of_childern }}" readonly>
                                @error('number_of_children')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="room_type">Room Type</label>
                                <input type="text" class="form-control text-white" id="room_type" name="room_type"
                                    placeholder="Room Type" value="{{ $agoda->room_type }}" readonly>
                                @error('room_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="promotion">Promotion</label>
                                <input type="text" class="form-control text-white" id="promotion" name="promotion"
                                    placeholder="promotion" value="{{ $agoda->promotion }}" readonly>
                                @error('promotion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="departure">Departure</label>
                                <input type="text" class="form-control text-white" id="departure" name="departure"
                                    placeholder="Departure" value="{{ $agoda->departure }}" readonly>
                                @error('departure')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="total_price">Total Price</label>
                                <input type="text" class="form-control text-white" id="total_price" name="total_price"
                                    placeholder="Departure" value="{{ $agoda->total_price }}" readonly>
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

