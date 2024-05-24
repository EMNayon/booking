<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class AgentController extends Controller
{
    public function index(Request $request){

        if($request->ajax()){
            $data = User::where('user_type',User::USER_TYPE_USER)->orderBy('id','desc')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status',function ($row){
                    return $row->status == User::STATUS_ACTIVE ? "Active":($row->status == User::STATUS_INACTIVE ? "InActive" : "Declined");
                })
                ->addColumn('created_at',function ($row){
                    return date('d M y',strtotime($row->created_at));
                })
                ->addColumn('action',function ($row){
                    return '<a class="btn btn-success text-white btn-sm" href="'.route('show_change_password',[$row->id]).'">Change Password</a>' .
                    ' <a class="btn btn-info text-white btn-sm" href="'.route('view_point',[$row->id]).'">Add Point</a>';


                })
                ->make(true);
        }else{
            return view('admin.agent_list');
        }
    }
    public function requestList(Request $request){
        if($request->ajax()){
            $data = User::where('status',User::STATUS_INACTIVE)->where('user_type',User::USER_TYPE_USER)->orderBy('id','desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status',function ($row){
                    return $row->status == User::STATUS_ACTIVE ? "Active":"InActive";
                })
                ->addColumn('created_at',function ($row){
                    return date('d M y',strtotime($row->created_at));
                })
                ->addColumn('action',function ($row){
                    return "<button class='btn btn-success btn-sm StatusApprove' data-id='".$row->id."'>Approve</button> <button class='btn btn-danger btn-sm StatusDecline' data-id='".$row->id."'>Deciled</button>";
                })
                ->make(true);
        }else{
            return view('admin.agent_request');
        }
    }

    public function agentStatusChange(Request $request){
        try {
            $user = User::find($request->id);
            $user->status = $request->status;
            $user->save();
            return response()->json([
                'status' => 'success'
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'status' => 'error'
            ]);
        }

    }


    public function viewPoint($id){
        $user = User::find($id);
        return view('admin.agent_point',compact('user'));
    }


    public function addPoint(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::find($request->id);
            $user->point = $user->point + request()->point;
            $user->save();
            DB::commit();
            Session::flash('success','Point Added Successfully');
            return redirect()->route('agent_list');
        }
        catch (\Exception $exception){
            DB::rollBack();
            Session::flash('error','Something went wrong. Please try again');
            return redirect()->back();
        }
    }
}
