<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoterController extends Controller
{

    public function index(){

        $user = Auth::user();

        return view('voters.index', compact('user'));
    }
}
