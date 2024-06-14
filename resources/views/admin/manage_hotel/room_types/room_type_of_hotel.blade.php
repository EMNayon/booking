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
                    <a class="btn btn-success text-white btn-sm" href={{ route('hotel') }}>Back</a>
                </div>

            </div>
            <div class="card-body">
                <div>
                    <h3 style="text-align: center">Hotel : {{$hotel->name}}</h3>
                </div>
                <table id="roomTypeList" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Room Type</th>
                            <th>Price Per Night</th>
                            <th>Description</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($result as $item)
                         <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->room_price_per_night}}</td>
                            <td>{{$item->description}}</td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>


@endsection
{{-- @section('js')
    <script>
        $(function() {
            var table = $('#roomTypeList').DataTable({
                processing: false,
                serverSide: true,
                // ajax: {
                //     url: "{{ route('country') }}",
                //     data: function(e) {}
                // },
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
@endsection --}}
