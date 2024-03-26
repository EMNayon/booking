@extends('layouts.admin')
@section('title', 'Insurance Certificates')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Insurance Certificates
            </div>
            <div class="card-body">
                <table id="FileSubmissionTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Nationality</th>
                            <th>Created By</th>
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

            var table = $('#FileSubmissionTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('submission_list') }}",
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
                        data: 'dob',
                        name: 'dob'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'nationality',
                        name: 'nationality'
                    },
                    {
                        data: 'created_by',
                        name: 'created_by'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
            });

        });
    </script>
@endsection
