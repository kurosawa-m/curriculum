<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
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
        // $user = Auth::user();
        // foreach ($user->roles as $role) {
        //     if ($role->id == 1) {
        //         $hasRole1 = true;
        //         break; // ロール1が見つかったらループを終了
        //     }
        // }
        
        // if ($hasRole1) {
        //     return $next($request);
        // } else {
        //     abort(404);
        // }

        // $user = Auth::user();
        // foreach($user->roles as $role){
        //     if($role->id ==1){
        //         return $next($request);
        //     }else{
        //         abort(404);
        //     }
        // }

        return $next($request);
    }
}
