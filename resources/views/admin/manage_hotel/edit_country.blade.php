@extends('layouts.admin')
@section('title','Edit Country')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card mb-4 mt-3">
                    <div class="card-body text-center">
                        <form action="{{route('update_country')}}" method="post">
                            @csrf
                            {{-- <input type="hidden" name="id" value="{{$user->id}}"> --}}
                            <h1 class="h3 mb-3 fw-normal">Edit Country</h1>

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
                            <input type="text" name='id' value="{{$country->id}}" hidden />
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="country" name="country" placeholder="Edit country" value={{$country->name}}>
                                <label for="Country">Country</label>
                                @error('country')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <button class="w-100 btn btn-lg btn-success mt-2" type="submit">Edit Country</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
