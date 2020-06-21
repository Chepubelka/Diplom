<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsBooker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (!$user->isBooker()){
            session()->flash('warning','У вас недостаточно прав для раздела Бухгалтерии');
            return redirect('/');
        }
        return $next($request);
    }
}
