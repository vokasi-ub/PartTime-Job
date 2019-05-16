<?php

namespace App\Http\Middleware;
use App\BadanUsahaModel;
use Illuminate\Support\Facades\Auth;
use Closure;

class dontCreate
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
        // $id = Auth::id();
        // $result = BadanUsahaModel::where('id', $id)->first();

        if(auth()->check() && $request->user()->level == 'instansi' && !empty(BadanUsahaModel::where('id', Auth::id())->first())) {

            return redirect()->guest('/instansi');
            
        }
            return $next($request);
    }
}
