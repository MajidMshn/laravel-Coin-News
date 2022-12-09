<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Back\Article;
use App\Models\Back\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderby('id', 'desc')->get();
        return view('Back.articles.articles', compact('articles'));
    }

    public function create(Category $category)
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('Back.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
//        $messages = [
//            'name.required'=>'فیلد نام الزامیست',
//            'slug.required'=>'فیلد اسلاگ الزامیست',
//            'description.required'=>'توضیحات الزامیست'
//        ];
//        $validated = $request->validate([
//            'name'=>'required',
//            'slug'=>'required',
//            'description'=>'required',
//
//        ],$messages);
        $article = new Article();
        $article->name = $request->name;
        $article->slug = $request->slug;
        $article->description = $request->description;
        $article->image = $request->image;
        $article->user_id = $request->user_id;
        $article->keywords = $request->keySelected;

        try {

            $article->save($request->all());
            $article->categories()->attach($request->categories);
            $msg = 'مطلب جدید با موفقیت ذخیره شد!';
            return redirect(route('A.articles'))->with('success', $msg);
        } catch (Exeption $e) {
            $msg = 'مشکلی پیش آمده لطفا مجددا تلاش کنید' . $e->getCode();
            return redirect()->back()->with('warning', $msg);
        }
    }

    public function show(Article $article)
    {
        $article->incerment('hit');
    }

    public function edit(Article $article)
    {
        $categories = Category::all()->pluck('name','id');
        return view('Back.articles.edit',compact('article','categories'));
    }

    public function update(Request $request, Article $article)
    {
        $article->name = $request->name;
        $article->slug = $request->slug;
        $article->description = $request->description;
        $article->image = $request->image;
        $article->user_id = $request->user_id;
        $article->keywords = $request->keySelected;
        try {

            $article->save();
            $article->categories()->sync($request->categories);
            $msg = 'مطلب با موفقیت بروزرسانی شد!';
            return redirect(route('A.articles'))->with('success', $msg);
        } catch (Exeption $e) {
            $msg = 'مشکلی پیش آمده لطفا مجددا تلاش کنید' . $e->getCode();
            return redirect()->back()->with('warning', $msg);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Back\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        try {
            $article->delete();
            $msg = 'پست مورد نظر با موفقیت حذف گردید!';
            return redirect(route('A.articles'))->with('success',$msg);
        }catch (Exception $e){
            $msg = 'مشکلی پیش آمده لطفا مجددا تلاش کنید'.$e->getCode();
            return redirect()->back()->with('warning',$msg);
        }

    }

    public function updateStatus(Article $article)
    {
        if ($article->status == 0) {
            $article->status = 1;
            $msg = 'پست مورد نظر در سایت منتشر شد!';
        } else {
            $article->status = 0;
            $msg = 'انتشار پست مورد نظر متوقف شد!';
        }
        try {
            $article->save();
            return redirect(route('A.articles'))->with('success', $msg);
        } catch (Exception $e) {
            $msg = 'مشکلی پیش آمده لطفا مجدد تلاش کنید' . $e->getCode();
            return redirect()->back()->with('success', $msg);
        }
        $article->save();
    }

    public function preview(Article $article){

        return view('Back.articles.preview',compact('article'));
    }
}
