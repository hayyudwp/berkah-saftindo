<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_admin) {
            \Log::info('Admin middleware passed for user: ' . Auth::user()->username);
            return $next($request);
        }
    
        \Log::warning('Admin middleware failed for user: ' . (Auth::user()->username ?? 'Guest'));
        return redirect('/')->with('error', 'You do not have admin access.');
    }
}
