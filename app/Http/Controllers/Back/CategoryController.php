<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Back\Category;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::all();
        return view('Back.categories.categories', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Back.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        try {
            $category->save();
            $msg = 'دسته بندی جدید با موفقیت ذخیره شد!';
            return redirect(route('A.categories'))->with('success', $msg);
        } catch (Exception $e) {
            $msg = 'خطایی رخ داده لطفا مجدد تلاش کنید' . $e->getCode();
            return redirect()->back()->with('warning', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Back\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Back\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('Back.categories.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->slug = $request->slug;
        try {
            $category->save();
            $msg = 'تغییرات با موفقیت ذخیره شد!';
            return redirect(route('A.categories'))->with('success',$msg);
        }catch (Exception $e){
            $msg = 'مشکلی پیش آمده لطفا مجدد تلاش کنید!'.$e->getCode();
            return redirect()->back()->with('warning',$msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Back\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

        }catch (Exception $e){
            $msg = 'مشکلی پیش آمده لطفا مجدد تلاش کنید!'.$e->getCode();
            return redirect()->back()->with('warning',$msg);
        }
        $msg = 'تغییرات با موفقیت ذخیره شد!';
        return redirect(route('A.categories'))->with('success',$msg);
    }
}
