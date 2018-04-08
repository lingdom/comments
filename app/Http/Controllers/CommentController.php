<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Traits\ApiJsonResponse;
use Illuminate\Support\Facades\Input;



class CommentController extends Controller
{
	use ApiJsonResponse;


    public function store(Request $request) {
        try {
            $post = Post::where('id', '=', Input::get('post_id'))->first();
            $post->addComment([
            	'username' => $request->get('username'),
                'content' => $request->get('content'),
                'parent_id' => $request->get('parent_id', null)
            ]);
            return response()->json($this->successResponse($post->getThreadedComments(),''));
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }
    }
}
