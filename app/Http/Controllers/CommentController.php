<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function doadd(CommentRequest $req) {

        $comment = new Comment;

        $comment->fill( $req->all() );

        $comment->user_id = session('id');

        $comment->save();

        return $comment;

    }

    public function index($blog_id) {

        return Comment::where('blog_id',$blog_id)
                      ->orderBy('id','desc')
                      ->with('user')
                      ->paginate(3);

    }
    
}
