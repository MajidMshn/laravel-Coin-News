<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Exception;
use App\Models\Comment;
use App\Models\Front\Article;
use Illuminate\Http\Request;
use function redirect;

class CommentController extends Controller
{

    public function store(Request $request,Article $article)
    {
        $messages = [
          'name.required'=>'ورود نام الزامیست',
          'email.required'=>'ورود ایمیل الزامیست',
          'msg.required'=>'نظر شما فاقد متن است ',
            'g-recaptcha-response.required'=>'لطفا تیک امنیتی را بزنید',

        ];

        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'msg'=>'required',

            'g-recaptcha-response' => 'required',

        ],$messages);
        $request['user_id']= auth()->user()->id;
        $request['article_id'] = $article->id;
        try {
            $article->comments()->create([
//                $request->all()
                'name'=>htmlspecialchars($request->name),
                'msg'=>htmlspecialchars($request->msg),
                'email'=>htmlspecialchars($request->email),
                'user_id'=>$request->user_id,

                'article_id'=>$article->id,
]);
        }catch (Exception $e){
            $msg = 'خطایی رخ داده لطفا مجدد تلاش کنید'.$e->getCode();
            return redirect()->back()->with('warning',$msg);
        }
        $msg = 'نظر شما با موفقیت ثبت شد و پس از تایید مدیر به نمایش گذاشته میشود';
        return redirect()->back()->with('success',$msg);

    }
    public function replyStore(Request $request , Comment $comment){

    $reply = new Comment();
    $reply->parent_id = $request->parent_id;
    $reply->article_id = $request->article_id;
    $reply->msg = $request->msg;
    $reply->name = $request->name;
    $reply->email = $request->email;
    $reply->user_id = auth()->id();
    $post = Article::find($request->article_id);
        try {
            $post->comments()->save($reply);
        }catch (Exception $e){
            $msg = 'خطایی رخ داده لطفا مجدد تلاش کنید'.$e->getCode();
            return redirect()->back()->with('warning',$msg);
        }
        $msg = 'نظر شما با موفقیت ثبت شد و پس از تایید مدیر به نمایش گذاشته میشود';
        return redirect()->back()->with('success',$msg);

    }


}
