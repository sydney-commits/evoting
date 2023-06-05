<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class Administrator
{

    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {

            $user = Auth::user();

        //          if (Auth::user()->role == 1) {
        //     return redirect()->route('superadmin');
        // }

            if ($user->role == 'admin') {
                return $next($request);
            }
            else {
                return redirect(route('homepage'))->withResponse('User Subscribed is Not An Admin');
            }
        }

        else {

            return redirect(route('homepage'))->withResponse('User Subscribed is Not An Admin');


        }

        //abort(403);
    }
}
