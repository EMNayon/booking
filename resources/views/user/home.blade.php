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
            <form action="{{ route('submit-member-form') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <h3 class="text-left" style="font-weight: bold; margin-left: 10px;">Money Receipt Information</h3>
                            <div class="col-sm-12">
                                <label for="bin_no">BIN No </label>
                                <input type="text" class="form-control" id="bin_no"
                                    name="bin_no" placeholder="BIN No"
                                    ">
                                    {{-- value="{{ rand(100000000000, 9999999999) }} --}}
                                @error('bin_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="mushak">MUSHAK </label>
                                <input type="text" class="form-control" id="mushak" name="mushak"
                                    placeholder="MUSHAK" value="{{ old('mushak') }}">
                                @error('mushak')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="issuing_office">Issuing Office </label>
                                <input type="text" class="form-control" id="issuing_office" name="issuing_office"
                                    placeholder="Issuing Office" value="{{ old('issuing_office') }}">
                                @error('issuing_office')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="money_receipt_no">Money Receipt No</label>
                                <input type="text" class="form-control" id="money_receipt_no" name="money_receipt_no"
                                    placeholder="Money Receipt No" value="{{ old('money_receipt_no') }}">
                                @error('money_receipt_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="class_of_insurance">Class of Insurance</label>
                                <input type="text" class="form-control" id="class_of_insurance" name="class_of_insurance"
                                    placeholder="Class of Insurance" value="{{ old('class_of_insurance') }}">
                                @error('class_of_insurance')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="mode_of_payment">Mode Of Payment </label>
                                <input type="text" class="form-control text-white" id="mode_of_payment" name="mode_of_payment"
                                    placeholder="Mode Of Payment"  >
                                @error('mode_of_payment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="drawn_on">Drawn On </label>
                                <input type="text" class="form-control text-white" id="drawn_on" name="drawn_on"
                                    placeholder="Drawn On"  >
                                @error('drawn_on')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <h3 class="text-left" style="font-weight: bold">Insurance Details</h3>


                            <div class="col-sm-12 ">
                                <label for="policy_no">Policy No</label>
                                <input type="text" class="form-control text-white" id="policy_no" name="policy_no"
                                    placeholder="Policy No" value="">
                                @error('policy_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="issue_date">Issue Date</label>
                                <input type="text" class="form-control text-white" id="issue_date" name="issue_date"
                                    placeholder="Issue Date" value="">
                                @error('issue_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="plan_type">Plan Type</label>
                                <input type="text" class="form-control" id="plan_type" name="plan_type"
                                    placeholder="Plan Type" value="{{ old('plan_type') }}">
                                @error('plan_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="area_of_travel">Area of Travel</label>
                                <input type="text" class="form-control" id="area_of_travel" name="area_of_travel"
                                    placeholder="Area of Travel" value="{{ old('area_of_travel') }}">
                                @error('area_of_travel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="no_of_days_covered">No of Days Covered</label>
                                <input type="text" class="form-control" id="no_of_days_covered" name="no_of_days_covered"
                                    placeholder="No of Days Covered" value="{{ old('no_of_days_covered') }}">
                                @error('no_of_days_covered')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="premium">Premium</label>
                                <input type="text" class="form-control" id="premium" name="premium"
                                    placeholder="Premium" value="{{ old('premium') }}">
                                @error('premium')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-12 ">
                                <label for="mr_no">MR No</label>
                                <input type="text" class="form-control" id="mr_no" name="mr_no"
                                    placeholder="MR No" value="{{ old('mr_no') }}">
                                @error('mr_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <h3 class="text-center" style="font-weight: bold; margin-left: 10px;">Insured Details</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name">Name </label>
                                <input type="text" class="form-control" id="name"
                                    name="name" placeholder="Name"
                                    ">
                                    {{-- value="{{ rand(100000000000, 9999999999) }} --}}
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="mobile_no">Mobile No </label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no"
                                    placeholder="Mobile No" value="{{ old('mobile_no') }}">
                                @error('mobile_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="address">Address </label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Address" value="{{ old('address') }}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <label for="age">Age </label>
                                <input type="text" class="form-control" id="age" name="age"
                                    placeholder="Age" value="{{ old('age') }}">
                                @error('age')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="dob">Date Of Birth </label>
                                <input type="text" class="form-control" id="dob" name="dob"
                                    placeholder="Date Of Birth" value="{{ old('dob') }}">
                                @error('dob')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 ">
                                <label for="pass_no">Passport No </label>
                                <input type="text" class="form-control" id="pass_no" name="pass_no"
                                    placeholder="Passport No" value="{{ old('pass_no') }}">
                                @error('pass_no')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">

                            <div class="col-sm-12 ">
                                <label for="nationality">Nationality </label>
                                <input type="text" class="form-control" id="nationality" name="nationality"
                                    placeholder="Nationality" value="{{ old('nationality') }}">
                                @error('nationality')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
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
