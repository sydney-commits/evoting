<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function superadmin(){
        $users = User::all();

        $admins = User::where('role','admin')->get();
        $super_admins = User::where('role','superadmin')->get();

        $roles = ['user','admin','superadmin'];

     return view ('samples.superadmin',[
        'users'=>$users,
        'admins'=>$admins,
        'super_admins'=>$super_admins,
        'roles'=>$roles
     ]);
    }

    public function manageRights(Request $request){
        // dd($request->input('role_assigned'));
        // dd();


        $user = User::findorFail($request->input('user_id'));

        $user->update([
            'role' => $request->input('role_assigned'),
            // Add more fields to update as needed
        ]);


        return redirect()->back()->with('success', 'User Role updated successfully.');


    }
}
