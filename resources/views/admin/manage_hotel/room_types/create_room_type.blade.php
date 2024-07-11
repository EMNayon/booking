@extends('layouts.admin')
@section('title','Add Room Type')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card mb-4 mt-3">
                    <div class="card-body text-center">
                        <form action="{{route('store_room_type')}}" method="post">
                            @csrf
                            {{-- <input type="hidden" name="id" value="{{$user->id}}"> --}}
                            <h1 class="h3 mb-3 fw-normal">Add Room Type</h1>

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
                                <input type="text" class="form-control" id="title" name="title" placeholder="Add Room Type" min=0>
                                <label for="title">Room Type</label>
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="description" name="description" placeholder="Add Description">
                                <label for="description">Description</label>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <button class="w-100 btn btn-lg btn-success mt-2" type="submit">Add Room Type</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
