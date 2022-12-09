<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Faker\Extension\Extension;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;
use function PHPUnit\Framework\fileExists;

class UserController extends Controller
{

    public function index()
    {
     $users =User::orderby('id')->get();

     return view('Back.users.users',compact('users'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {

    }

    public function edit(User $user)
    {

        return view('Front.profile',compact('user'));
    }

    public function update(Request $request,User $user)
    {
// check image file
       if ($request->hasFile('image')){
           $ext = $request->file('image')->getClientOriginalExtension();
           $fileName = htmlspecialchars($request->user()->name).'.'.$ext;
           $check = getimagesize($request->file('image'));
           if ($check !== false){
               if ($ext === "jpg" | $ext === "jpeg"  | $ext === "png" | $ext === "gif"){
                   $uploadStatus = 1;
               }
               else {
                   $uploadStatus = 0 ;
               }
           }else {
               $uploadStatus = 0 ;
           }
        if ($uploadStatus == 1){
            $path =  request()->file('image')->move(public_path(). '/storage/profile/' , $fileName);
             $user->image = $path;
        }
        else{
            $msg = "فایل آپلود شده معتبر نیست لطفا فایل دیگری را بارگذاری نمایید!فرمت های مجاز:jpg | jpeg | gif | png";
            return redirect()->back()->with('warning',$msg);
        }

       }
       if ($request->password !== null){
           if ($request->password === $request->password_confirmation)
           $user->password = htmlspecialchars($request->password);
           else{
               $msg = "پسورد و تاییدیه تطابق ندارند";
               return redirect()->back()->with('warning',$msg);
           }
       }

       $user->name = htmlspecialchars($request->name);

        try {
        $user->save();
        $msg = 'حساب کاربری با موفقیت بروزرسانی شد!';
        return redirect(route('Front.index'))->with('success',$msg);
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
