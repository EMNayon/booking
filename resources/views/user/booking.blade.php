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
                                        <button class="btn btn-outline-secondary btn-minus" type="button">-</button>
                                    </div>
                                    <input type="text" class="form-control" id="rooms" name="rooms" placeholder="Rooms" value="{{ old('rooms') }}" min="1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
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
                                        <button class="btn btn-outline-secondary btn-minus" type="button">-</button>
                                    </div>
                                    <input type="text" class="form-control" id="nights" name="nights" placeholder="Nights" value="{{ old('nights') }}" min="1">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
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
                            {{-- <h3 class="text-left" style="font-weight: bold">Insurance Details</h3> --}}

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
                                <input type="text" class="form-control datepicker"  id="check_in" name="check_in"
                                    placeholder="Check In" value="{{ old('check_in') }}">
                                @error('check_in')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="check_out">Check Out </label>
                                <input type="text" class="form-control datepicker" id="check_out" name="check_out"
                                    placeholder="Check Out" value="{{ old('check_out') }}">
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
                                    placeholder="Tax" value="15%" readonly>
                                @error('tax')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="price">Price </label>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Price" value="{{ old('price') }}">
                                @error('price')
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
                            $('#hotel').append('<option value="' + hotel.id + '">' +
                                hotel.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script>
        $(function() {
            $('.datepicker').datepicker({
                autoclose: true
            });
        });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd', // Set the desired date format
            autoclose: true,
        });
    </script>


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.btn-plus').click(function() {
        var input = $(this).closest('.input-group').find('input');
        var value = parseInt(input.val(), 10) || 0;
        input.val(value + 1);
    });

    $('.btn-minus').click(function() {
        var input = $(this).closest('.input-group').find('input');
        var value = parseInt(input.val(), 10) || 0;
        if (value > 1) { // prevent negative values
            input.val(value - 1);
        }
    });
});
</script> --}}

@endsection
