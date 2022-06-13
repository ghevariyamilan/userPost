<?php

namespace App\Http\Controllers;

use App\Jobs\WelcomeUserMailJob;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    function userPost(){
        $category = Category::all();
        return view("ManagePost.create",compact('category'));
    }

    function userPost_store(Request $request){
        if ($request->ajax()){
            $input = $request->all();

            $validate = Validator::make($input,[
                'category' => 'required',
                'post_title' => 'required|max:255',
            ]);

            if ($validate->fails()) {
                return response()->json(['status'=> false,'errors'=>$validate->errors()->all()]);
            }

            $user = Auth::user()->_id;
            $post_arr = [
                'user_id' => $user,
                'title' => $input['post_title']
            ];
            $post = Post::create($post_arr);

            if ($post_arr){
                foreach ($input['category'] as $val){
                    PostCategory::create([
                        'category_id' => $val,
                        'post_id' => $post->_id
                    ]);
                }
            }

            $admin = Cache::get('adminData',null);
            if ($admin){
                $admin = User::where('is_admin',1)->first();
                Cache::put('adminData',$admin,50000);
            }

            $message['to'] = $admin->email;
            $message['message'] = $user->first_name." ".$user->last_name."User was Created new email in this blogging site.";

            dispatch(new WelcomeUserMailJob($message));
            return response()->json(['status' => true, 'msg' => 'Success']);
        }
        return response()->json(['status' => false, 'msg' => 'Invalid Request']);
    }
}
