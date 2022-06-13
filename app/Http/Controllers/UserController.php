<?php

namespace App\Http\Controllers;

use App\Jobs\WelcomeUserMailJob;
use App\Mail\WelcomeUserMail;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    function index(Request $request){
        if ($request->ajax()) {
            $data = User::with('post')->orderBy('_id','desc')->take(100)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('user_post', function(User $user){
                    $btn = $user->post->count();
                    return $btn;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.url('user-posts/'.$row->id).'" class="edit btn btn-primary btn-sm">View</a>
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

    function user_post(Request $request, $userId = ''){
        if ($request->ajax()){
            $user_post = Post::where('user_id',$request->userId)->get();

            return Datatables::of($user_post)
                ->addIndexColumn()
                ->make(true);
        }

        if ($userId){
            return view('ManageUser.user_post',compact('userId'));
        }
        return redirect('home');
    }

    function add_post(){
        $category = Category::all()->pluck('_id')->toArray();
        $post = Post::all()->pluck('_id')->toArray();

        foreach ($post as $val){
            PostCategory::create([
                'category_id' => $category[array_rand($category,1)],
                'post_id' => $val
            ]);
        }
        dd('success');
    }


    function userPost(){
        return view('');
    }
}
