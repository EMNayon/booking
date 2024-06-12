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
            <h3 class="text-left" style="font-weight: bold; margin-left: 10px;">Booking</h3>
            <form action="{{ route('store_booking') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">

                            <div class="col-sm-12 ">
                                <label for="confirmation_no">Confirmation No </label>
                                <input type="text" class="form-control text-white" id="confirmation_no"
                                    name="confirmation_no" placeholder="Confirmation No" value={{ $confirmationNo }}
                                    readonly>
                                @error('confirmation_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="pin_code">Pin Code </label>
                                <input type="text" class="form-control text-white" id="pin_code" name="pin_code"
                                    placeholder="Pin Code" value={{ $pinCode }} readonly>
                                @error('pin_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="country">Country</label>
                                <select class="form-control text-white" id="country" name="country">
                                    <option value="" disabled selected>Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value={{ $country->id }}>{{ $country->name }}</option>
                                    @endforeach
                                    <!-- Add more countries as needed -->
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="state">State</label>
                                <select class="form-control text-white" id="state" name="state">
                                    <option value="" disabled selected>Select State</option>
                                    <!-- Add more states as needed -->
                                </select>
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="city">City</label>
                                <select class="form-control text-white" id="city" name="city">
                                    <option value="" disabled selected>Select City</option>
                                    <!-- Add more cities as needed -->
                                </select>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="hotel">Hotel</label>
                                <select class="form-control text-white" id="hotel" name="hotel">
                                    <option value="" disabled selected>Select Hotel</option>
                                    <!-- Add more hotels as needed -->
                                </select>
                                @error('hotel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="rooms">Rooms</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-minus" id="rooms-minus"
                                            type="button">-</button>
                                    </div>
                                    <input type="text" class="form-control" id="rooms" name="rooms"
                                        placeholder="Rooms" value="1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-plus" id="rooms-plus"
                                            type="button">+</button>
                                    </div>
                                </div>
                                @error('rooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <label for="nights">Nights</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-minus" id="nights-minus"
                                            type="button">-</button>
                                    </div>
                                    <input type="number" class="form-control" id="nights" name="nights"
                                        placeholder="Nights" value="1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-plus" id="nights-plus"
                                            type="button">+</button>
                                    </div>
                                </div>
                                @error('nights')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="phone">Phone </label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Phone Number">
                                {{-- value="{{ rand(100000000000, 9999999999) }} --}}
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="check_in">Check In </label>
                                <input type="text" class="form-control datetimepicker" id="check_in" name="check_in"
                                    placeholder="Check In" value="{{ old('check_in') }}">
                                @error('check_in')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="check_out">Check Out </label>
                                <input type="text" class="form-control datetimepicker" id="check_out"
                                    name="check_out" placeholder="Check Out" value="{{ old('check_out') }}">
                                @error('check_out')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="guest_name">Guest Name</label>
                                <input type="text" class="form-control" id="guest_name" name="guest_name"
                                    placeholder="Guest Name" value="{{ old('guest_name') }}">
                                @error('guest_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="delux_room">Delux Room</label>
                                <input type="text" class="form-control" id="delux_room" name="delux_room"
                                    placeholder="Delux Room" value="{{ old('delux_room') }}">
                                @error('delux_room')
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
                                <label for="price_per_night">Price per Night</label>
                                <input type="text" class="form-control text-white" id="price_per_night"
                                    name="price_per_night" placeholder="Price per Night" readonly>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- Total price display -->
                            <div class="col-sm-12 ">
                                <div class="form-group">
                                    <label for="total_price">Total Price</label>
                                    <input type="text" class="form-control text-white" id="total_price"
                                        name="total_price" placeholder="Total Price" readonly>
                                </div>
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

            $(document).off('click', '#nights-plus');
        $(document).off('click', '#nights-minus');
        $(document).off('click', '#rooms-plus');
        $(document).off('click', '#rooms-minus');

        
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
                                '" data-price="' + hotel.hotel_price_per_night +
                                '" data-tax="' + hotel.hotel_tax + '">' +
                                hotel.name + '</option>');
                        });
                    }
                });
            });

            $('#hotel').change(function() {
                var tax = $('#hotel option:selected').data('tax');
                var pricePerNight = $('#hotel option:selected').data('price');
                $('#tax').val(tax + '%');
                $('#price_per_night').val(pricePerNight);
                calculateTotalPrice();
            });

            $('#nights-plus').click(function() {
                var nights = parseInt($('#nights').val()) || 0;
                $('#nights').val(nights + 1);
                calculateTotalPrice();
            });

            $('#nights-minus').click(function() {
                var nights = parseInt($('#nights').val()) || 0;
                if (nights > 1) {
                    $('#nights').val(nights - 1);
                    calculateTotalPrice();
                }
            });

            $('#rooms-plus').click(function() {
                var rooms = parseInt($('#rooms').val()) || 0;
                $('#rooms').val(rooms + 1);
                calculateTotalPrice();
            });

            $('#rooms-minus').click(function() {
                var rooms = parseInt($('#rooms').val()) || 0;
                if (rooms > 1) {
                    $('#rooms').val(rooms - 1);
                    calculateTotalPrice();
                }
            });

            $('#nights, #rooms, #price_per_night').on('input', function() {
                calculateTotalPrice();
            });

            function calculateTotalPrice() {
                var nights = parseInt($('#nights').val()) || 0;
                var rooms = parseInt($('#rooms').val()) || 0;
                var pricePerNight = parseFloat($('#price_per_night').val()) || 0;

                if (!isNaN(nights) && !isNaN(rooms) && !isNaN(pricePerNight)) {
                    var totalPrice = nights * rooms * pricePerNight;
                    $('#total_price').val(totalPrice.toFixed(2));
                }
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js">
    </script>
    <script>
        $(".datetimepicker").each(function() {
            $(this).datetimepicker();
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
