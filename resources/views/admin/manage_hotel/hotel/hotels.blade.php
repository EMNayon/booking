@extends('layouts.admin')
@section('title', 'Hotel List')
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
                    Hotel List
                </div>
                <div>
                    <a class="btn btn-success text-white btn-sm" href={{ route('create_hotel') }}>Add Hotel</a>
                </div>

            </div>
            <div class="card-body">
                <table id="hotelList" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this hotel?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
    <script>
        $(function() {
            var table = $('#hotelList').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('hotel') }}",
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
                        data: 'city',
                        name: 'city'
                    },
                    {
                        data: 'state',
                        name: 'state'
                    },
                    {
                        data: 'country',
                        name: 'country'
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


        $(document).ready(function() {
            var hotelId;

            // Handle delete button click
            $(document).on('click', '.delete-btn', function() {
                hotelId = $(this).data('id');
                console.log(hotelId);
                $('#confirmDelete').data('id', hotelId);
            });

            // Handle confirm delete button click
            $('#confirmDelete').click(function() {
                var id = $(this).data('id');
                // console.log(id);
                console.log('okay baby' + id);
                $.ajax({
                    url: '/admin/hotels/delete/' + id,
                    type: 'post',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response.success);
                        if (response.success) {
                            location.reload();
                        } else {
                            alert('Error deleting hotel');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Error deleting hotel 2:", textStatus, errorThrown);
                        alert('Error deleting hotel 1');
                    }
                });

                $('#deleteModal').modal('hide');
            });
        });
    </script>
@endsection
