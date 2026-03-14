<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Multi-Tenant Role Gate Middleware
 *
 * Usage in routes:
 *   ->middleware('role:admin')
 *   ->middleware('role:admin,hospital_owner')
 *
 * The `role` column on the users table drives all access control.
 */
class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): mixed
    {
        $user = $request->user();

        if (! $user) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        if (empty($roles) || in_array($user->role, $roles, true)) {
            return $next($request);
        }

        return response()->json([
            'message' => 'Forbidden. Required role(s): ' . implode(', ', $roles),
        ], 403);
    }
}
