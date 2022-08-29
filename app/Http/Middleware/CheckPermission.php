<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permissions)
{
    if (!auth()->user()->hasPermissionTo($permissions)) {
        return response()->json(["res" => false, "message" => "No tienes autorización para ingresar"], 403);
    }
    return $next($request);
}
}
