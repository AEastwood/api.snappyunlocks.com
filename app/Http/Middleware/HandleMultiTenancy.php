<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HandleMultiTenancy
{

    /**
     * Handle an incoming request.
     *
     * @param \Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routes = [
            "/dashboard",
            "/forgot-password",
            "/livewire/livewire.js",
            "/livewire/livewire.min.js.map",
            "/livewire/preview-file/{filename}",
            "/livewire/update",
            "/livewire/upload-file",
            "/login",
            "/logout",
            "/register",
            "/reset-password",
            "/reset-password/{token}",
            "/sanctum/csrf-cookie",
            "/storage/{path}",
            "/two-factor-challenge",
            "/user/confirm-password",
            "/user/confirmed-password-status",
            "/user/confirmed-two-factor-authentication",
            "/user/password",
            "/user/profile",
            "/user/profile-information",
            "/user/two-factor-authentication",
            "/user/two-factor-qr-code",
            "/user/two-factor-recovery-codes",
            "/user/two-factor-secret-key",
        ];

        if ($request->host() !== config('app.domains.api_url')) {
            return $next($request);
        }

        if ($request->host() === config('app.domains.api_url') && in_array($request->getPathInfo(), $routes)) {
            abort(404, 'not found');
        }

        return $next($request);
    }
}
