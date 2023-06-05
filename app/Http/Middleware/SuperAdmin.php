<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
{

    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {

            $user = Auth::user();



            if ($user->role == 'superadmin') {
                return $next($request);
            }
            else {
                return redirect(route('homepage'))->withResponse('User Subscribed is Not An SuperAdmin');
            }
        }

        else {

            return redirect(route('homepage'))->withResponse('User Should Register');


        }
    }
}
