@extends('layouts.admin')
@section('title','Change Password')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card mb-4 mt-3">
                    <div class="card-body text-center">
                        <form action="{{route('submit_change_password')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <img class="mb-4" src="{{asset('bd_logo.png')}}" height="100px">
                            <h1 class="h3 mb-3 fw-normal">Change Password</h1>

                            @if(\Illuminate\Support\Facades\Session::has('error'))
                                <div class="alert alert-danger alert-dismissible pb-2" role="alert">
                                    {{\Illuminate\Support\Facades\Session::get('error')}}
                                </div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success alert-dismissible pb-2" role="alert">
                                    {{\Illuminate\Support\Facades\Session::get('success')}}
                                </div>
                            @endif
                            <div class="form-floating mt-2">
                                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" value="{{$user->email}}" readonly>
                                <label for="floatingInput">Email address</label>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-floating mt-2">
                                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-floating mt-2 mb-2">
                                <input type="password" class="form-control" id="floatingPassword" name="confirm_password" placeholder="Confirm Password">
                                <label for="floatingPassword">Confirm Password</label>
                                @error('confirm_password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button class="w-100 btn btn-lg btn-success" type="submit">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
