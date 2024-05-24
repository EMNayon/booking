@extends('layouts.admin')
@section('title', 'City List')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
            <div>
                <i class="fas fa-table me-1"></i>
                City List
            </div>
            <div>
                <a class="btn btn-success text-white btn-sm" href={{route('create_city')}}>Add City</a>
            </div>

            </div>
            <div class="card-body">
                <table id="cityList" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
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
            var table = $('#cityList').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('city') }}",
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
