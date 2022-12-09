<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\AnswerComment;
use App\Models\Back\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderby('id','desc')->get();
        return view('Back.comments.comments',compact('comments'));
    }
    public function answers(){
        $answers = AnswerComment::orderby('id','desc')->get();
        return view('Back.comments.answerComments',compact('answers'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit(Comment $comment)
    {
        return view('Back.comments.edit',compact('comment'));
    }


    public function update(Request $request,Comment $comment)
    {
        $comment->name = $request->name;
        $comment->msg = $request->msg;
        $comment->save();
        $msg = 'تغییرات با موفقیت ذخیره شد';
        return redirect(route('admin.comments'))->with('success',$msg);
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        $msg = '';
        return redirect(route('admin.comments'))->with('success',$msg);
    }
    public function changeStatus(Comment $comment){

        if ($comment->status == 1) {
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }

        try {
            $comment->save();
        }catch (Exception $e){
            $msg = 'خطایی رخ داده مجدد تلاش کنید'.$e->getCode();
            return redirect()->back()->with('warning',$msg);
        }
        $msg = "بروزرسانی با موفقیت انجام شد";
        return redirect(route('admin.comments'))->with('success', $msg);

    }
}
