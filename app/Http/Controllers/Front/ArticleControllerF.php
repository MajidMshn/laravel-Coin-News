<?php

namespace App\Http\Controllers\Front;

use App\Models\AnswerComment;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Front\Article;
use App\Models\Back\Category;
use Illuminate\Support\Facades\Auth;


class ArticleControllerF extends Controller
{
     public function index()
    {
        $last = Article::latest()->first()->id;
           $articles1 = Article::orderby('created_at','desc')->take(6)->where('id','<=',$last)->where('status',1)->get();
           $last2 = $articles1->last()->id;
           $articles2 = Article::orderby('created_at','desc')->take(6)->where('id','<',$last2)->where('status',1)->get();

        $articles3 = Article::orderby('id')->take(6)->where('status',1)->get();
        $articles4 = Article::orderby('id','desc')->take(6)->where('status',1)->get();
        return view('Front.main',compact('articles1','articles2','articles3','articles4'));
    }


    public function show(Article $article)
    {

        $comment = Comment::orderby('id')->where('status',1)->where('article_id',$article->id)->where('parent_id',Null)->get();
        $reply = Comment::where('parent_id','!=','Null')->where('status',1)->where('article_id',$article->id)->get();
        $articles11 = Article::orderby('id','desc')->take(8)->get();
        $nasher = User::orderby('name')->where('id',$article->user_id)->first();
       $article->incerment('hit');
        return view('Front.article',compact('article','comment','articles11','nasher','reply'));
    }









}
