@extends('layouts.user')
@section('title', 'Insurance Certificates')
@section('css')
@endsection
@section('content')
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title">Insurance Certificates</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive ps">
                <table class="table tablesorter">
                    <thead class=" text-primary">
                        <tr>
                            <th>S/L No.</th>
                            <th>Policy No.</th>
                            <th>Name</th>
                            <th>Issue Date</th>
                            <th>Passport</th>
                            <th>Country</th>
                            <th>Reference</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->certificate_no }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->effective_date }}</td>
                                <td>{{ $row->passport }}</td>
                                <td>{{ $row->destination }}</td>
                                <td>{{ $row->reference }}</td>
                                <td>{{ $row->phone_no }}</td>
                                <td>
                                    {!! "<a class='btn btn-sm btn-info text-white' href='" .
                                        route('print_wecare', [$row->code]) .
                                        "'>PDF Download (We Care)</a><br><br><a class='btn btn-sm btn-info text-white' href='" .
                                        route('print_travelvisit', [$row->code]) .
                                        "'>PDF Download (Travel Visit)</a>" !!}
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
