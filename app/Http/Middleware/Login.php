<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $dni = $request->get("DNI");
        $tfno = $request->get("Tfno");
        $persona = \DB::table('personas')->where('dni','=',$dni)
        ->where('tfno','=',$tfno)
        ->get();

        if($dni != null){
            return $next($request);
        }else{
            return response()->json("CRENDIALS REQUIRED");
        }


    }
}
