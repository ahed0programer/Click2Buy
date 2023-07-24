<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class chackAdminForDashbord
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            $role_ids = Role::whereIn('type', ['admin', 'superadmin'])->pluck('id');
            $user_role_id = auth()->user()->role_id;
            if ($role_ids->contains($user_role_id)) {
                return $next($request);
            }

        return response('Forbidden', 403);
    }
}
