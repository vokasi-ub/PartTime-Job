<?php

namespace App\Http\Middleware;
use App\BadanUsahaModel;
use \Auth;
use Closure;

class isComplete
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

        // $id = $request->route('id');
        // $result = BadanUsahaModel::where('id', $id)->first();

        if(auth()->check() && $request->user()->level == 'instansi' && empty(BadanUsahaModel::where('id', Auth::id())->first())) {

                return redirect()->guest('/instansi');
            
        }
            return $next($request);
    }
}
