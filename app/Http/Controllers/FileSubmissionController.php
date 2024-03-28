<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class FileSubmissionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Member::orderBy('id', 'desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('created_at', function ($row) {
                    return date('d M y', strtotime($row->created_at));
                })
                ->addColumn('gender', function ($row) {
                    return ucfirst($row->gender);
                })
                ->addColumn('created_by', function ($row) {
                    $user = User::find($row->created_by);
                    return !empty($user) ? $user->name : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    return "<a class='btn btn-sm btn-primary' href='" . route('member_edit', [$row->code]) . "'>View/Edit</a> <a  title='Money Reciept'  class='btn btn-sm btn-info text-white' href='" . route('print_wecare', [$row->code]) . "'>MR</a> <a title='Policy Download' class='btn btn-sm btn-info text-white' href='"  . route('print_travelvisit', [$row->code]) . "'>OMP</a>"
                        . ($row->hidden ? " <a class='btn btn-sm btn-success text-white' href='" . route('member_toggle', [$row->code]) . "'>Show QR code</a>" : " <a class='btn btn-sm btn-warning text-white' href='" . route('member_toggle', [$row->code]) . "'>Hide QR code</a>")
                        . " <a class='btn btn-sm btn-danger text-white' onclick='return confirm(\"Are you sure about your action?\")' href='" . route('member_delete', [$row->code]) . "'>Delete</a>";
                })
                ->make(true);
        } else {
            return view('admin.file_submission_list');
        }
    }
}
