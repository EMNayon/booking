@extends('layouts.admin')
@section('title', 'Add State')
@section('content')
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card mb-4 mt-3">
                    <div class="card-body text-center">
                        <form action="{{ route('store_city') }}" method="post">
                            @csrf
                            {{-- <input type="hidden" name="id" value="{{$user->id}}"> --}}
                            <h1 class="h3 mb-3 fw-normal">Add State</h1>

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
                                <select class="form-control" id="country" name="country" aria-label="Country" required
                                    onchange="fetchStates()">
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

                            {{-- <div class="form-floating mt-2">
                                <select class="form-control" id="state" name="state" aria-label="State" required>
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                        <option name="state" value={{ $state->id }}>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                <label for="country">State</label>
                                @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}

                            <div id="state"></div>

                            <div class="form-floating mt-2">
                                <input type="text" class="form-control" id="city" name="city"
                                    placeholder="Add City" required>
                                <label for="state">City</label>
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <button class="w-100 btn btn-lg btn-success mt-2" type="submit">Add City</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>

        var selectedCountry = '';
        $("#country").change(function() {
            var selectedCountry = $(this).val();
        });


        function fetchStates() {
            $countryId = selectedCountry
            console.log($countryId);


            $.ajax({
                url: '{{ route('fetch_state', ['id' => 1]) }}',
                dataType: 'html',
                success: function(data) {
                    console.log(data);
                    $('#state').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error fetching content:", textStatus, errorThrown);
                }
            });

        }
        $(document).ready(function() {

        });
    </script>
@endsection