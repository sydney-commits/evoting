<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserAccount
{

    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {

            $user = Auth::user();


            if ($user->role == ('user')) {


                return $next($request);
            }
            else {
                return redirect(route('home'))->withResponse('Not A Normal User');
            }


        }

        else {

            return redirect(route('home'))->withResponse('User Subscribed is Not An Admin');


        }
        // abort(403);
    }
}
