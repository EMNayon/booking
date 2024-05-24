@extends('layouts.admin')
@section('title','Add Point')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card mb-4 mt-3">
                    <div class="card-body text-center">
                        <form action="{{route('add_point')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <h1 class="h3 mb-3 fw-normal">Add Point</h1>

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
                                <input type="number" class="form-control" id="point" name="point" placeholder="Point" min=0>
                                <label for="point">Point</label>
                                @error('point')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <button class="w-100 btn btn-lg btn-success mt-2" type="submit">Add Point</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
