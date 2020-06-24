<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function postComment($id,Request $request)
    {
        $post= Post::find($id);
        $comment = new Comment();
        $comment->idPost=$id;
        $comment->idUser =Auth::user()->id;
        $comment->Content = $request->Content;
        $comment->save();
        return redirect("chi-tiet/{$id}/".$post->Slug.".html")->with('success','Bạn viết bình luận thành công');

    }
}
