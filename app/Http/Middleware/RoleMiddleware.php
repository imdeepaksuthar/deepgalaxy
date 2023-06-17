<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$roles)
    {
        if(auth()->check()) {
            $roleData = Role::whereIn('name', $roles)->get();
            if (count($roleData) >= '1' && in_array(strtolower(auth()->user()->role->name), $roles)) {
                return $next($request);
            }else{
                // abort(403, "Cannot access to restricted page");
                return redirect()->back();              
            }
        }
        return redirect('/home')->with('error', 'You do not have permission to access this page.');
    }
}
