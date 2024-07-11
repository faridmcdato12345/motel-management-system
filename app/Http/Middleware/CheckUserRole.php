<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        
        // Add user roles and permissions to the request
        $request->merge([
            'user_roles' => $user->roles->pluck('name'),
            'user_permissions' => $user->getAllPermissions()->pluck('name'),
        ]);

        // You can also add them to view composers if you're using blade
        view()->share('user_roles', $user->roles->pluck('name'));
        view()->share('user_permissions', $user->getAllPermissions()->pluck('name'));

        return $next($request);
    }
}
