<?php

namespace App\Http\Controllers;

use App\Jobs\WelcomeUserMailJob;
use App\Mail\WelcomeUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    function index(Request $request){
        if ($request->ajax()) {
            $data = User::with('post')->orderBy('_id','desc')->get();
//            dd($data->post->count());
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_post', function(User $user){
                    $btn = $user->post->count();
                    return $btn;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm" data-id="'.$row->id.'">View</a>
                    <a href="javascript:void(0)" class="edit btn btn-primary btn-sm sendMail" data-id="'.$row->id.'">Send Email</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('ManageUser.index');
    }

    function send_welcome_mail(Request $request){
        if ($request->ajax()){
            $user = User::find($request->id);

            $message['to'] = $user->email;
            $message['message'] = 'Welcome, '.$user->first_name." ".$user->last_name." in this blogging site.";

            dispatch(new WelcomeUserMailJob($message));
            return response()->json(['status' => true, 'msg' => 'Email Schedule Successfully.']);
        }
        return response()->json(['status' => false, 'msg' => 'Invalid Request']);
    }
}
