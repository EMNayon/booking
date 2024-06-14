@extends('layouts.admin')
@section('title', 'Room Type List')
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
                    Room Type List
                </div>
                <div>
                    <a class="btn btn-success text-white btn-sm" href={{ route('create_room_type') }}>Add Room Type</a>
                </div>

            </div>
            <div class="card-body">
                <table id="roomTypeList" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
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
            var table = $('#roomTypeList').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('room_types') }}",
                    data: function(e) {}
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'description',
                        name: 'description'
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
