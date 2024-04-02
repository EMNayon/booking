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
                            {{-- <th>Country</th> --}}
                            {{-- <th>Reference</th> --}}
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->policy_no }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->issue_date }}</td>
                                <td>{{ $row->pass_no }}</td>
                                {{-- <td>{{ $row->created_by }}</td> --}}
                                {{-- <td>{{ $row->name }}</td> --}}
                                <td>{{ $row->mobile_no }}</td>
                                <td>
                                    {!! "<a title='Money Receipt'   class='btn btn-sm btn-info text-white' href='" .
                                        route('money_receipt', [$row->code]) .
                                        "'>MR</a><a  title='Policy Download'  class='btn btn-sm btn-info text-white' href='" .
                                        route('policy', [$row->code]) .
                                        "'>OMP</a>" !!}
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
