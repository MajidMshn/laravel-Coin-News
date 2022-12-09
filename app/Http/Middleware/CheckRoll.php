<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRoll
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->roll == 1 ){
            return $next($request);
        }
        $msg = "برای استفاده از این بخش سایت باید ابتدا به حساب کاربری خود وارد شده یا در سایت عضو شوید!";
        return redirect(route('Front.index'))->with('warning',$msg);
    }
}
