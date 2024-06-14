@extends('layouts.user')
@section('title', 'Online Booking')
@section('css')
    <style>
        label {
            color: white;
        }

        select option {
            color: black;
        }

        .input-group {
            display: flex;
            align-items: center;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                    <span><b> Success - </b> {{ \Illuminate\Support\Facades\Session::get('success') }}</span>
                </div>
            @endif
            @if (\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
            <form action="{{ route('store_agoda') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="booking_id">Booking ID </label>
                                <input type="text" class="form-control text-white" id="booking_id" name="booking_id"
                                    placeholder="Booking ID" value={{ $bookingId }} readonly>
                                {{-- value="{{ rand(100000000000, 9999999999) }} --}}
                                @error('booking_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="booking_reference_no">Booking Reference No </label>
                                <input type="text" class="form-control text-white" id="booking_reference_no"
                                    name="booking_reference_no" placeholder="Booking Reference No"
                                    value="{{ $bookingReferenceNo }}" readonly>
                                @error('booking_reference_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="member_id">Member ID</label>
                                <input type="text" class="form-control text-white" id="member_id" name="member_id"
                                    placeholder="Member ID" value="{{ $memberId }}" readonly>
                                @error('member_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="client">Client </label>
                                <input type="text" class="form-control" id="client" name="client"
                                    placeholder="Client" value="{{ old('client') }}">
                                @error('client')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-sm-12 ">
                                <label for="country_of_residence">Country of Residence</label>
                                <select class="form-control " id="country_of_residence" name="country_of_residence">
                                    <option value="" disabled selected>Select Residence Country</option>
                                    @foreach ($countries as $country)
                                        <option value={{ $country->id }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_of_residence')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <label for="country">Country</label>
                                <select class="form-control " id="country" name="country">
                                    <option value="" disabled selected>Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value={{ $country->id }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <label for="state">State</label>
                                <select class="form-control " id="state" name="state">
                                    <option value="" disabled selected>Select State</option>
                                    <!-- Add more states as needed -->
                                </select>
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-sm-12">
                                <label for="city">City</label>
                                <select class="form-control" id="city" name="city">
                                    <option value="" disabled selected>Select City</option>
                                </select>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-sm-12">
                                <label for="hotel">Hotel</label>
                                <select class="form-control" id="hotel" name="hotel">
                                    <option value="" disabled selected>Select Hotel</option>
                                </select>
                                @error('hotel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="tax">Tax</label>
                                <input type="text" class="form-control text-white" id="tax" name="tax"
                                    placeholder="Tax" readonly>
                                @error('tax')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="guest_name">Guest Name</label>
                                <input type="text" class="form-control text-white" id="guest_name" name="guest_name"
                                    placeholder="Guest Name">
                                @error('guest_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <label for="property_contact_number">Property Contact Number</label>
                                <input type="text" class="form-control text-white" id="property_contact_number"
                                    name="property_contact_number" placeholder="Property Contact Number" readonly>
                                @error('property_contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="col-sm-12 ">
                                <label for="number_of_rooms">Number of Rooms</label>
                                <input type="number" class="form-control text-white" id="number_of_rooms"
                                    name="number_of_rooms" placeholder="Number of rooms" value="" min="1">
                                @error('number_of_rooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            <div class="col-sm-12">
                                <label for="number_of_rooms">Number of Rooms</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-minus" type="button"
                                            id="button-minus">-</button>
                                    </div>
                                    <input type="text" class="form-control " id="number_of_rooms"
                                        name="number_of_rooms" placeholder="Number of rooms" value="1">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary btn-plus" type="button"
                                            id="button-plus">+</button>
                                    </div>
                                </div>
                                @error('number_of_rooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="number_of_extra_beds">Number of Extra Beds</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-minus" type="button">-</button>
                                    </div>
                                    <input type="text" class="form-control" id="number_of_extra_beds"
                                        name="number_of_extra_beds" placeholder="Number of Extra Beds"
                                        value="{{ old('number_of_extra_beds') }}" min="1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
                                    </div>
                                </div>
                                @error('number_of_extra_beds')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="number_of_adults">Number of Adults</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-minus" type="button">-</button>
                                    </div>
                                    <input type="text" class="form-control" id="number_of_adults"
                                        name="number_of_adults" placeholder="Number of Adults"
                                        value="{{ old('number_of_adults') }}" min="1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
                                    </div>
                                </div>
                                @error('number_of_adults')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="number_of_children">Number of Children</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-minus" type="button">-</button>
                                    </div>
                                    <input type="text" class="form-control" id="number_of_children"
                                        name="number_of_children" placeholder="Number of Children"
                                        value="{{ old('number_of_children') }}" min="1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
                                    </div>
                                </div>
                                @error('number_of_children')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-sm-12 ">
                                <div class="form-floating mt-2">
                                    <label for="room_type">Room Type</label>
                                    <select class="form-control" id="room_type" name="room_type" >
                                        <option value="" disabled selected>Select Room Type</option>
                                    </select>
                                    @error('room_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 ">
                                <label for="promotion">Promotion</label>
                                <input type="number" class="form-control" id="promotion" name="promotion"
                                    placeholder="Price includes 15% discount!" value="{{ old('promotion') }}">
                                @error('promotion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="arrival">Arrival </label>
                                <input type="datetime" class="form-control  datetimepicker" id="arrival"
                                    name="arrival" placeholder="Arrival">
                                @error('arrival')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="departure">Departure</label>
                                <input type="datetime" class="form-control datetimepicker" id="departure"
                                    name="departure" placeholder="Departure" value="{{ old('departure') }}">
                                @error('departure')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>

                <div class="row pt-2">
                    <div class="col-md-4 col-sm-12 offset-md-4">
                        <center>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')


    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var countryId = $(this).val();

                $.ajax({
                    url: '{{ route('fetch_states') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        country_id: countryId
                    },
                    success: function(data) {
                        console.log(data);
                        $('#state').html(
                            '<option value="" disabled selected>Select State</option>');
                        $.each(data, function(index, state) {
                            $('#state').append('<option value="' + state.id + '">' +
                                state.name + '</option>');
                        });
                    }
                });
            });

            $('#state').change(function() {
                var stateId = $(this).val();
                $.ajax({
                    url: '{{ route('fetch_cities') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        state_id: stateId
                    },
                    success: function(data) {
                        $('#city').html(
                            '<option value="" disabled selected>Select City</option>');
                        $.each(data, function(index, city) {
                            $('#city').append('<option value="' + city.id + '">' + city
                                .name + '</option>');
                        });
                    }
                });
            });

            $('#city').change(function() {
                var cityId = $(this).val();
                $.ajax({
                    url: '{{ route('fetch_hotels') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        city_id: cityId
                    },
                    success: function(data) {
                        $('#hotel').html(
                            '<option value="" disabled selected>Select Hotel</option>');
                        $.each(data, function(index, hotel) {
                            $('#hotel').append('<option value="' + hotel.id +
                                '"  data-tax="' + hotel.hotel_tax +
                                '" data-property_contact_number="' + hotel
                                .hotel_mobile_number + '">' +
                                hotel.name + '</option>');
                        });
                    }
                });
            });


            $('#hotel').change(function() {
                var tax = $('#hotel option:selected').data('tax');
                $('#tax').val(tax + '%');
            });
            $('#hotel').change(function() {
                var property_contact_number = $('#hotel option:selected').data('property_contact_number');
                $('#property_contact_number').val(property_contact_number);
            });

            $('#hotel').change(function() {
                var hotelId = $(this).val();
                $.ajax({
                    url: '{{ route('fetch_room_types') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        hotel_id: hotelId
                    },
                    success: function(data) {
                        console.log(data);
                        $('#room_type').html(
                            '<option value="" disabled selected>Select Room Type</option>');
                        $.each(data, function(index, item) {
                            $('#room_type').append('<option value="' + item
                                .room_type_id + '">' + item.title + '</option>');
                        });
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
    </script>
    <script>
        $(".datetimepicker").each(function() {
            $(this).datetimepicker();
        });
    </script>






@endsection
