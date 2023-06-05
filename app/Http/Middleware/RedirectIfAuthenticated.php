<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

              //  $user = Auth::guard($guard);

            $user = Auth::user();


            if ($user->role == 'admin') {
                return redirect(route('admin_dashboard'));

            }
            elseif($user->role == 'user') {
                return redirect(route('user_dashboard'));
            }


               // return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
