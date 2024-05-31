@extends('layouts.user')
@section('title', 'Online Booking')
@section('css')
@endsection
@section('content')
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title">Online Booking</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive ps">
                <table class="table tablesorter">
                    <thead class=" text-primary">
                        <tr>
                            <th>S/L No.</th>
                            <th>Name</th>
                            <th>Hotel Name </th>
                            <th>Phone</th>
                            <th>Rooms / Nights</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->guest_name }}</td>
                                <td>{{ $row->hotel->name}}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->rooms}} / {{ $row->nights }}</td>
                                <td>{{ $row->price }}</td>
                                <td>{{ $row->total_price }}</td>
                                {{-- <td>
                                    {!! "<a title='Money Receipt'   class='btn btn-sm btn-info text-white' href='" .
                                        route('money_receipt', [$row->phone]) .
                                        "'>MR</a><a  title='Policy Download'  class='btn btn-sm btn-info text-white' href='" .
                                        route('policy', [$row->phone]) .
                                        "'>OMP</a>" !!}
                                </td> --}}
                                <td>

                                    <a href="{{ route('download_booking', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Show Data"><i class="bi bi-download"></i></a>

                                    {{-- <a href="{{ route('show_booking', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Show Data"><i class="bi bi-eye"></i></a> --}}

                                    <a href="{{ route('booking_file_submission_show', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Show Data"><i class="bi bi-eye"></i></a>
                                    {{-- <a href="#" title="Delete Data" >
                                        <i class="bi bi-trash"></i>
                                    </a> --}}
                                    <form action="{{ route('bookings.destroy', $row->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Data">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
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

    $(document).ready(function() {
        var bookingId;

        // Handle delete button click
        $(document).on('click', '.delete-btn', function() {
            bookingId = $(this).data('id');
            console.log(bookingId);
            $('#confirmDelete').data('id', bookingId);
        });

        // Handle confirm delete button click
        $('#confirmDelete').click(function() {
            var id = $(this).data('id');
            // console.log(id);
            console.log('okay baby' + id);
            $.ajax({
                url: '/user/booking-delete/' + id,
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response.success);
                    if (response.success) {
                        location.reload();
                    } else {
                        alert('Error deleting Booking');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error deleting Booking 2:", textStatus, errorThrown);
                    alert('Error deleting Booking 1');
                }
            });

            $('#deleteModal').modal('hide');
        });
    });
    </script>
    @endsection


