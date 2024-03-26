@extends('layouts.admin')
@section('title','Agent Request')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Agent Request
            </div>
            <div class="card-body">
                <table id="AgentListTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Request Date</th>
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

        $(function () {

            var table = $('#AgentListTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{route('agent_request')}}",
                    data: function (e) { }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action',orderable:false,searchable:false},

                ],
            });

        });
        $(document).on('click','.StatusApprove',function () {
            let id = $(this).data('id');
            $.ajax({
                url: "{{route('agent_status_change')}}",
                type:"post",
                data:{
                    id:id,
                    status: 1,
                },
                success:function (res) {
                    if(res.status == 'success'){
                        $('#AgentListTable').DataTable().draw(true);
                        swal('Approved',"Successfully Approved",'success');
                    }else{
                        swal('Failed',"Something went wrong",'error');
                    }
                }
            });
        });
        $(document).on('click','.StatusDecline',function () {
            let id = $(this).data('id');
            $.ajax({
                url: "{{route('agent_status_change')}}",
                type:"post",
                data:{
                    id:id,
                    status: 2,
                },
                success:function (res) {
                    if(res.status == 'success'){
                        $('#AgentListTable').DataTable().draw(true);
                        swal('Approved',"Successfully Declined",'success');
                    }else{
                        swal('Failed',"Something went wrong",'error');
                    }
                }
            });
        });
    </script>
@endsection
