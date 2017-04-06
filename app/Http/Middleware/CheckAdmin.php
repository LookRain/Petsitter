<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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

        if (!auth()->check() || !auth()->user()->isAdmin) {
            // $message = "You need to be an Admin to access this page!";
            // echo "<script type='text/javascript'>alert('$message');</script>";
            return redirect('/');
        } 
        
        return $next($request);
        
        
    }
}
