<?php
/**
 * Proneilrabbit - SMM Panel script
 * Domain: https://Proneil.com/
 * Codecanyon Item: https://codecanyon.net/item/Proneilrabbit-smm-panel/19821624
 *
 */
namespace App\Http\Middleware;

use Closure;

class VerifyAppIsNotInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('database.installed') !== '%installed%') {
            return redirect('/');
        }
        return $next($request);
    }
}
