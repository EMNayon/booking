@extends('layouts.admin')
@section('title','Add Country')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card mb-4 mt-3">
                    <div class="card-body text-center">
                        <form action="{{route('store_country')}}" method="post">
                            @csrf
                            {{-- <input type="hidden" name="id" value="{{$user->id}}"> --}}
                            <h1 class="h3 mb-3 fw-normal">Add Country</h1>

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
                                <input type="text" class="form-control" id="country" name="country" placeholder="Add country" min=0>
                                <label for="Country">Country</label>
                                @error('country')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="country_code" name="country_code" placeholder="Add country_code" min=0>
                                <label for="country_code">Country Code</label>
                                @error('country_code')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="currency_prefix" name="currency_prefix" placeholder="Add currency_prefix" min=0>
                                <label for="currency_prefix">Currency Prefix (BDT)</label>
                                @error('currency_prefix')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="currency_icon" name="currency_icon" placeholder="Add currency_icon" min=0>
                                <label for="currency_icon">Currency Icon (৳)</label>
                                @error('currency_icon')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>



                            <button class="w-100 btn btn-lg btn-success mt-2" type="submit">Add Country</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
