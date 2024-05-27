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
            <form action="{{ route('submit-member-form') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">

                            {{-- <div class="col-sm-12 ">
                                <label for="confirmation_no">Confirmation No </label>
                                <input type="text" class="form-control text-white" id="confirmation_no" name="confirmation_no"
                                    placeholder="Confirmation No"  >
                                @error('confirmation_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="pin_code">Pin Code </label>
                                <input type="text" class="form-control text-white" id="pin_code" name="pin_code"
                                    placeholder="Pin Code"  >
                                @error('pin_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            <div class="col-sm-12">
                                <label for="country">Country</label>
                                <select class="form-control text-white" id="country" name="country">
                                    <option value="" disabled selected>Select Country</option>
                                    <option value="usa">United States</option>
                                    <option value="canada">Canada</option>
                                    <option value="uk">United Kingdom</option>
                                    <!-- Add more countries as needed -->
                                </select>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <label for="city">City</label>
                                <select class="form-control text-white" id="city" name="city">
                                    <option value="" disabled selected>Select City</option>
                                    <option value="new_york">New York</option>
                                    <option value="los_angeles">Los Angeles</option>
                                    <option value="chicago">Chicago</option>
                                    <!-- Add more cities as needed -->
                                </select>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <label for="state">State</label>
                                <select class="form-control text-white" id="state" name="state">
                                    <option value="" disabled selected>Select State</option>
                                    <option value="california">California</option>
                                    <option value="texas">Texas</option>
                                    <option value="florida">Florida</option>
                                    <!-- Add more states as needed -->
                                </select>
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <label for="hotel">Hotel</label>
                                <select class="form-control text-white" id="hotel" name="hotel">
                                    <option value="" disabled selected>Select Hotel</option>
                                    <option value="hilton">Hilton</option>
                                    <option value="marriott">Marriott</option>
                                    <option value="holiday_inn">Holiday Inn</option>
                                    <!-- Add more hotels as needed -->
                                </select>
                                @error('hotel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="rooms">Rooms</label>
                                <input type="text" class="form-control" id="rooms" name="rooms"
                                    placeholder="Room" value="{{ old('rooms') }}">
                                @error('rooms')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="nights">Nights</label>
                                <input type="text" class="form-control" id="nights" name="nights"
                                    placeholder="Nights" value="{{ old('nights') }}">
                                @error('nights')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="phone">Phone </label>
                                <input type="text" class="form-control" id="phone"
                                    name="phone" placeholder="Phone Number"
                                    ">
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
                                <input type="text" class="form-control" id="check_in" name="check_in"
                                    placeholder="Check In" value="{{ old('check_in') }}">
                                @error('check_in')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="check_out">Check Out </label>
                                <input type="text" class="form-control" id="check_out" name="check_out"
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
                                <input type="text" class="form-control" id="tax" name="tax"
                                    placeholder="Tax" value="{{ old('tax') }}">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function() {
            $('.datepicker').datepicker({
                autoclose: true
            });
        });
        $(document).on('change', '.changeVaccine', function() {
            let id = $(this).attr('id');
            let value = $(this).val() || 0;
            $("#" + id + "_other").addClass('d-none');
            if (value == "{{ \App\Models\Member::VACCINE_OTHER }}") {
                $("#" + id + "_other").removeClass('d-none');
            }
        });
    </script>
@endsection

