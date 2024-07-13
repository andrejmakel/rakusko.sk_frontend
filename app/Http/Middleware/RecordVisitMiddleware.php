<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;

class RecordVisitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('visit_recorded')) {

            Visit::create([
                'timestamp' => now(),
                'ip' => $request->ip(),
                'domain' => env('APP_URL'),
            ]);
            $request->session()->put('visit_recorded', true);
        }

        return $next($request);
    }
}
