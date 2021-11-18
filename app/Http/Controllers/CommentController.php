<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
    public function store(Request $request)
    {
        if(auth()->guard('client')->check() || auth()->check()){
            Comment::create([
                'client_id' => Auth::guard('client')->user()->id,
                'blog_id' => $request->blog_id,
                'comment' => $request->comment
            ]);
            return redirect()->back()->with('success', 'commented successfully');
        }
        return redirect()->back()->with('danger', 'Please login first!!');

    }

    public function destroy($id)
    {
        $comment = Comment::findorFail($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Succesfully Deleted!!');
    }

    public function feature($id)
    {
        $comment = Comment::findorFail($id);
        $comment['status'] = !$comment['status'];
        $comment->update();
        return redirect()->back()->with('success', 'Succesfully Changed Status!!');
    }
}
