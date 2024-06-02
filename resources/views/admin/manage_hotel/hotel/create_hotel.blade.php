@extends('layouts.admin')
@section('title', 'Create Hotel')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card mb-4 mt-3">
                    <div class="card-body text-center">
                        <form action="{{ route('store_hotel') }}" method="post"  enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="hidden" name="id" value="{{$user->id}}"> --}}
                            <h1 class="h3 mb-3 fw-normal">Add Hotel</h1>

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


                            <div class="form-floating mt-2">
                                <select class="form-control" id="country" name="country" aria-label="Country" required>
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option name="country" value={{ $country->id }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <label for="country">Country</label>
                                @error('country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div id="states"></div>
                            <div id="cities"></div>

                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="hotel" name="hotel"
                                    placeholder="Add Hotel" required>
                                <label for="hotel">Hotel</label>
                                @error('hotel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="google_map_add" name="google_map_add"
                                    placeholder="Add Google Map Code" required>
                                <label for="google_map_add">Hotel Google Map Add </label>
                                @error('google_map_add')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="hotel_tax" name="hotel_tax"
                                    placeholder="Add Hotel Tax" required>
                                <label for="hotel_tax">Hotel Tax</label>
                                @error('hotel_tax')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="hotel_type" name="hotel_type"
                                    placeholder="Add Hotel Type" required>
                                <label for="hotel_type">Room Type</label>
                                @error('hotel_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="hotel_price_per_night" name="hotel_price_per_night"
                                    placeholder="Add Hotel Price" required>
                                <label for="hotel_price_per_night">Hotel Price ( Per Night ) </label>
                                @error('hotel_price_per_night')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-floating mt-2">
                                <input type="file"  class="form-control" id="hotel_image" name="hotel_image">
                                <label for="hotel_image">Hotel Image </label>
                                @error('hotel_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button class="w-100 btn btn-lg btn-success mt-2" type="submit">Add Hotel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function() {

            $("#country").change(function() {
                var selectedCountry = $(this).val();
                fetchStates(selectedCountry);
            });

            // Function to fetch states based on selected country
            function fetchStates(selectedCountry) {
                $.ajax({
                    url: '{{ route('fetch_state') }}',
                    type: 'POST',
                    data: {
                        country: selectedCountry
                    },
                    dataType: 'html',
                    success: function(data) {
                        $('#states').html(data);
                        // Attach event listener to the dynamically added select box for states
                        attachStateChangeListener();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error fetching content:", textStatus, errorThrown);
                    }
                });
            }

            // Function to attach event listener to state select box
            function attachStateChangeListener() {
                $(".state-select").change(function() {
                    var selectedState = $(this).val();
                    fetchCities(selectedState);
                });
            }

            // Function to fetch cities based on selected state
            function fetchCities(selectedState) {
                $.ajax({
                    url: '{{ route('fetch_city') }}',
                    type: 'POST',
                    data: {
                        state: selectedState
                    },
                    dataType: 'html',
                    success: function(data) {
                        $('#cities').html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error fetching content:", textStatus, errorThrown);
                    }
                });
            }
        });
    </script>
@endsection
