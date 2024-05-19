@extends('layouts.admin')
@section('title', 'Add New Agent')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card mb-4 mt-3">
                    {{--                    <div class="card-header"> --}}
                    {{--                        <i class="fas fa-table me-1"></i> --}}
                    {{--                        Create New Agent --}}
                    {{--                    </div> --}}
                    <div class="card-body text-center">
                        <form action="{{ route('signup.submit') }}" method="post">
                            @csrf
                            <img class="mb-4" src="{{ asset('assets/image/bd_logo.png') }}" height="100px">
                            <h1 class="h3 mb-3 fw-normal">Add New Agent</h1>

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

                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" name="name" placeholder="">
                                <label for="name">name</label>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mt-2">
                                <input type="email" class="form-control" id="floatingInput" name="email"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder=""
                                    min="11" max="13">
                                <label for="phone">Phone</label>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="point" name="point" placeholder=""
                                    min="11" max="13">
                                <label for="point">Point</label>
                                @error('point')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="floatingPassword" name="password"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mt-2 mb-2">
                                <input type="password" class="form-control" id="floatingPassword" name="confirm_password"
                                    placeholder="Confirm Password">
                                <label for="floatingPassword">Confirm Password</label>
                                @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
