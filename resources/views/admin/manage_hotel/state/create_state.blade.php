@extends('layouts.admin')
@section('title','Add State')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card mb-4 mt-3">
                    <div class="card-body text-center">
                        <form action="{{route('store_state')}}" method="post">
                            @csrf
                            {{-- <input type="hidden" name="id" value="{{$user->id}}"> --}}
                            <h1 class="h3 mb-3 fw-normal">Add State</h1>

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
                                <select class="form-control" id="country" name="country" aria-label="Country" required>
                                  <option value="">Select Country</option>
                                  @foreach ($countries as $country)
                                    <option name="country" value={{$country->id}}>{{$country->name}}</option>
                                  @endforeach
                                  </select>
                                <label for="country">Country</label>
                                @error('country')
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                              </div>

                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="state" name="state" placeholder="Add State" required>
                                <label for="state">State</label>
                                @error('state')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <button class="w-100 btn btn-lg btn-success mt-2" type="submit">Add State</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
