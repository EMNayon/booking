@extends('layouts.admin')
@section('title', 'Insurance Edit')
@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
@endsection
@section('content')
    <div class="py-2">
        @if (\Illuminate\Support\Facades\Session::has('error'))
            <div class="alert alert-danger alert-dismissible pb-2" role="alert">
                {{ \Illuminate\Support\Facades\Session::get('error') }}
            </div>
        @endif
        @if (\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success alert-dismissible pb-2" role="alert">
                {{ \Illuminate\Support\Facades\Session::get('success') }}
            </div>
        @endif

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{ route('member_update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $member->id }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <h3 class="text-left pb-2">Beneficiary Information</h3>
                                    <div class="col-sm-12 pt-3">
                                        <label for="certificate_no">Certificate No <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="certificate_no" readonly
                                            name="certificate_no" placeholder="Certificate No"
                                            value="{{ $member->certificate_no }}">
                                        @error('certificate_no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Your Name" value="{{ $member->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="passport">Passport No</label>
                                        <input type="text" class="form-control" id="passport" name="passport"
                                            placeholder="Passport No" value="{{ $member->passport }}">
                                        @error('passport')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="name">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control datepicker" id="dob" name="dob"
                                            placeholder="Select Your Date of Birth" value="{{ $member->dob }}">
                                        @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="nid">National ID</label>
                                        <input type="text" class="form-control" id="nid" name="nid"
                                            placeholder="National ID" value="{{ $member->nid }}">
                                        @error('nid')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-12 pt-3">
                                        <label for="nationality">Nationality <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nationality" name="nationality"
                                            placeholder="Nationality" readonly value="Bangladeshi">
                                        @error('nationality')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="gender">Gender <span class="text-danger">*</span></label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="male" {{ $member->gender == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ $member->gender == 'female' ? 'selected' : '' }}>
                                                Female
                                            </option>
                                            <option value="other" {{ $member->gender == 'other' ? 'selected' : '' }}>Other
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <h3 class="text-left pb-2">Insurance Details</h3>

                                    <div class="col-sm-12 pt-3">
                                        <label for="destination">Destination</label>
                                        <select id="destination" class="form-control" name="destination" required>
                                            @foreach ($destinations as $destination)
                                                <option value="{{ $destination }}"
                                                    @if (old('destination', $member->destination) == $destination) selected @endif>{{ $destination }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('destination')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 pt-3">
                                        <label for="effective_date">Insurance Effective Date</label>
                                        <input type="text" class="form-control datepicker" id="effective_date"
                                            name="effective_date" placeholder="Date of Vaccination (Dose 1)"
                                            value="{{ $member->effective_date }}">
                                        @error('effective_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-12 pt-3">
                                        <label for="reference">Reference</label>
                                        <input type="text" class="form-control" id="reference" name="reference"
                                            placeholder="Reference" value="{{ $member->reference }}">
                                        @error('reference')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-12 pt-3">
                                        <label for="phone_no">Phone Number</label>
                                        <input type="text" class="form-control" id="phone_no" name="phone_no"
                                            placeholder="Number" value="{{ $member->phone_no }}">
                                        @error('phone_no')
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
