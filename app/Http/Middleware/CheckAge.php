<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
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
        $uri = $request->header('X-request-url');
        dd($uri);
        // if ($request->age <= 18) {
        //     return dd(response('Bạn chưa đủ 18 tuổi'));
        //     echo $uri;
        // }
        
        // return redirect('home'); // http://localhost:8000/home
    }}

