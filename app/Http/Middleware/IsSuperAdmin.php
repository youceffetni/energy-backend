<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    
    public function handle(Request $request, Closure $next): Response
    {

        if($request->user()->role!=1)
            return response()->json([
                "message"=>"forbidden"
            ],403);  
            
        return $next($request);
    }
}
