<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Zorgt ervoor dat alleen ingelogde admin-gebruikers toegang hebben.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Controleer of gebruiker is ingelogd en admin is
        if (!auth()->check() || !auth()->user()->is_admin) {
            // Als het geen admin is, geef 403 Forbidden
            abort(403, 'Niet toegestaan');
        }

        // Als het een admin is, laat het verzoek doorgaan
        return $next($request);
    }
}
