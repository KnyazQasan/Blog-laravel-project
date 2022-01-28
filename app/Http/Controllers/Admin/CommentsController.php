<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function getComments(){
        $comments = Comment::all();
        return view('Admin.comments.comment',[
            'comments'=> $comments
        ]);
    }
    public function deleteComment($id){
        $comments = Comment::find($id);
        $comments->delete();
        return redirect()->route('getComments');
    }
}
