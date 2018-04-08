<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Traits\ApiJsonResponse;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    use ApiJsonResponse;

    public function index() {
        try {
            $posts = Post::all();
            $posts->each(function($post) {
                $post['comments'] = $post->getThreadedComments();
            });
            return response()->json($this->successResponse($posts,''));
        } catch(\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function store(Request $request) {
        
    	try {
            $validator = Validator::make($request->all(), [
                'username' => 'required|max:32',
                'content' => 'required|max:65535'
            ]);
            if($validator->fails()) {
                return response()->json($this->errorResponse($validator->errors(),''));
            } else {
                $post = Post::create(['username' => $request->get('username'),'content' => $request->get('content')]);
                $post['comments'] = $post->getThreadedComments();
                return response()->json($this->successResponse($post,''));
            }
        } catch(\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }
}
