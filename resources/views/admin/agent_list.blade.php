@extends('layouts.admin')
@section('title', 'Agent List')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Agent List
            </div>
            <div class="card-body">
                <table id="AgentListTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>BDT</th>
                            <th>Status</th>
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
            var table = $('#AgentListTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('agent_list') }}",
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
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'point',
                        name: 'point'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false
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
