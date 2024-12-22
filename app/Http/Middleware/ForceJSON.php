<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceJSON
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->host() === config('app.domains.api_url')) {
            $request->headers->set('Accept', 'application/json');
            $request->headers->set('Content-Type', 'application/json');
            header('X-Powered-By: Django/1.2.1 SVN-13336');
        }

        return $next($request);
    }
}
