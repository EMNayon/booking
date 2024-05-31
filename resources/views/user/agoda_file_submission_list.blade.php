@extends('layouts.user')
@section('title', 'Agoda Info')
@section('css')
@endsection
@section('content')
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title">Agoda Info</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive ps">
                <table class="table tablesorter">
                    <thead class=" text-primary">
                        <tr>
                            <th>S/L No.</th>
                            <th>Booking ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Hotel Name</th>
                            <th>Rooms / Extra Beds</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($agodas) --}}
                        @foreach ($agodas as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->booking_id }}</td>
                                <td>{{ $row->client }}</td>
                                <td>{{ $row->property_contact_number }}</td>
                                <td>{{ $row->hotel->name }}</td>
                                {{-- <td>{{ $row->created_by }}</td> --}}
                                {{-- <td>{{ $row->name }}</td> --}}
                                <td>{{ $row->number_of_rooms }} / {{ $row->number_of_extra_beds }}</td>
                                {{-- <td>
                                    {!! "<a title='Money Receipt'   class='btn btn-sm btn-info text-white' href='" .
                                        route('money_receipt', [$row->code]) .
                                        "'>MR</a>!!}
                                </td> --}}
                                
                                <td>
                                    <a href="{{ route('show_agoda', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Show Data"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('download_agoda', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Download Data"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('agoda_file_submission_show', ['id' => $row->id]) }}" class="btn btn-sm btn-info" title="Show Data"><i class="bi bi-eye"></i></a>
                                    <form action="{{ route('agodas.destroy', $row->id) }}" method="POST" style="display:inline;">
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
    @endsection
    @section('js')
    @endsection
