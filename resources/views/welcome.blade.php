
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>QR code generator</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/jumbotron/">



    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>
<body>

<main>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" class="me-2" viewBox="0 0 118 94" role="img"><title>Bootstrap</title><path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z" fill="currentColor"></path></svg>
                <span class="fs-4">Dummy Surokkha APP</span>
            </a>
        </header>

        <div class="py-2">
            @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="alert alert-danger alert-dismissible pb-2" role="alert">
                {{\Illuminate\Support\Facades\Session::get('error')}}
            </div>
            @endif

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{route('submit-member-form')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <h3 class="text-left pb-2">Beneficiary Information</h3>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="certificate_no">Certificate No <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="certificate_no" name="certificate_no" placeholder="Certificate No" value="{{old('certificate_no')}}">
                                            @error('certificate_no')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="nid">National ID</label>
                                            <input type="text" class="form-control" id="nid" name="nid" placeholder="National ID" value="{{old('nid')}}">
                                            @error('nid')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="passport">Passport No</label>
                                            <input type="text" class="form-control" id="passport" name="passport" placeholder="Passport No" value="{{old('passport')}}">
                                            @error('passport')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="nationality">Nationality <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Nationality" value="{{old('nationality')}}">
                                            @error('nationality')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{old('name')}}">
                                            @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="name">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker" id="dob" name="dob" placeholder="Select Your Date of Birth" value="{{old('dob')}}">
                                            @error('dob')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="gender">Gender <span class="text-danger">*</span></label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="male" {{old('gender') == 'male' ? 'selected':''}}>Male</option>
                                                <option value="female" {{old('gender') == 'female' ? 'selected':''}}>Female</option>
                                                <option value="other" {{old('gender') == 'other' ? 'selected':''}}>Other</option>
                                            </select>
                                            @error('gender')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <h3 class="text-left pb-2">Vaccination Details</h3>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="date_of_dose_1">Date of Vaccination (Dose 1)</label>
                                            <input type="text" class="form-control datepicker" id="date_of_dose_1" name="date_of_dose_1" placeholder="Date of Vaccination (Dose 1)" value="{{old('date_of_dose_1')}}">
                                            @error('date_of_dose_1')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="name_of_dose_1">Name of Vaccine (Dose 1)</label>
                                            <input type="text" class="form-control" id="name_of_dose_1" name="name_of_dose_1" placeholder="Name of Vaccine (Dose 1)" value="{{old('name_of_dose_1')}}">
                                            @error('name_of_dose_1')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="date_of_dose_2">Date of Vaccination (Dose 2)</label>
                                            <input type="text" class="form-control datepicker" id="date_of_dose_2" name="date_of_dose_2" placeholder="Date of Vaccination (Dose 2)" value="{{old('date_of_dose_2')}}">
                                            @error('date_of_dose_2')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="name_of_dose_2">Name of Vaccine (Dose 2)</label>
                                            <input type="text" class="form-control" id="name_of_dose_2" name="name_of_dose_2" placeholder="Name of Vaccine (Dose 2)" value="{{old('name_of_dose_2')}}">
                                            @error('name_of_dose_2')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="``col-sm-12 pt-3">
                                            <label for="date_of_dose_3">Date of Vaccination (Dose 3)</label>
                                            <input type="text" class="form-control datepicker" id="date_of_dose_3" name="date_of_dose_3" placeholder="Date of Vaccination (Dose 3)" value="{{old('date_of_dose_3')}}">
                                            @error('date_of_dose_3')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="name_of_dose_3">Name of Vaccine (Dose 3)</label>
                                            <input type="text" class="form-control" id="name_of_dose_3" name="name_of_dose_3" placeholder="Name of Vaccine (Dose 3)" value="{{old('name_of_dose_3')}}">
                                            @error('name_of_dose_3')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="``col-sm-12 pt-3">
                                            <label for="vaccination_center">Vaccination Center</label>
                                            <select id="vaccination_center" class="form-control" name="vaccination_center" required>
                                                @foreach($centers as $center)
                                                    <option value="{{ $center }}" @if(old('vaccination_center', $member->vaccination_center) == $center) selected @endif>{{ $center }}</option>
                                                @endforeach
                                            </select>
                                            @error('vaccination_center')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="vaccinated_by">Vaccinated By</label>
                                            <input type="text" class="form-control" id="vaccinated_by" name="vaccinated_by" placeholder="Vaccinated By" value="{{old('vaccinated_by')}}">
                                            @error('vaccinated_by')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="``col-sm-12 pt-3">
                                            <label for="total_dose">Total Doses Given</label>
                                            <input type="text" class="form-control" id="total_dose" name="total_dose" placeholder="Total Doses Given" value="{{old('total_dose')}}">
                                            @error('total_dose')
                                            <span class="text-danger">{{$message}}</span>
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

        <footer class="pt-3 mt-4 text-muted border-top">
            &copy; {{date('Y')}}
        </footer>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(function () {
        $('.datepicker').datepicker({
            autoclose:true
        });
    });

</script>
</body>
</html>
