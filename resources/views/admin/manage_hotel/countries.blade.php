@extends('layouts.admin')
@section('title', 'Country List')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">

            @if (\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show pb-2" role="alert">
                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show pb-2" role="alert">
                    {{ \Illuminate\Support\Facades\Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="card-header d-flex justify-content-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Country List
                </div>
                <div>
                    <a class="btn btn-success text-white btn-sm" href={{ route('create_country') }}>Add Country</a>
                </div>

            </div>
            <div class="card-body">
                <table id="countryList" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Country Code</th>
                            <th>Country Prefix</th>
                            <th>Country Icon</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script>
        $(function() {
            var table = $('#countryList').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('country') }}",
                    data: function(e) {}
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'country_code',
                        country_code: 'country_code'
                    },
                    {
                        data: 'currency_prefix',
                        currency_prefix: 'currency_prefix'
                    },
                    {
                        data: 'currency_icon',
                        currency_icon: 'currency_icon'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
            });

        });
    </script>
@endsection
