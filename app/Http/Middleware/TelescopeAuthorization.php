<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TelescopeAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(! $this->guard()->check()){
            return redirect()->route('login');
        }

        // TODO: Abort if the authenticated user has no permission to view Telescope
        Gate::authorize('viewTelescope', $this->guard()->user());

        return $next($request);
    }

    protected function guard() {
        return auth()->guard('web');
    }
}
