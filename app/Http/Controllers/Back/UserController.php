<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PHPUnit\Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $users =User::orderby('id')->get();

     return view('Back.users.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Back.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {   $message = [
        'name.required'=>'نام الزامیست',
        'email.required'=>'ایمیل الزامیست',

    ];

        $validated = $request->validate([
        'name'=>'required',
        'email'=>'required',

        ],$message);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password !=null){
            $user->password = $request->password;
        }

        try {
        $user->save();
        $msg = 'حساب کاربری با موفقیت بروزرسانی شد!';
        return redirect(route('admin.users'))->with('success',$msg);
        }catch (Exception $e){
            $msg = 'خطایی رخ داده مجدد تلاش کنید!'.$e->getCode();
            return redirect()->back()->with('warning',$msg);
        }

    }

    public function destroy(User $user)
    {
        $user->delete();
        $msg = 'کاربر مورد نظر با موفقیت حذف شد!';
        return redirect(route('admin.users'))->with('success',$msg);
    }
    public function changeStatus(User $user ){
        if ($user->status == 1 ){
            $user->status = 0;
        }
        else{
            $user->status = 1;
        }
        try {
            $user->save();
            $msg = 'تغییرات با موفقیت ذخیره شد!';
            return redirect(route('admin.users'))->with('success',$msg);
        }catch (Exception $e){
            $msg = 'خطایی رخ داده لطفا مجدد تلاش کنید'.$e->getCode();
            return redirect()->back()->with('warning',$msg);
        }



    }
}
