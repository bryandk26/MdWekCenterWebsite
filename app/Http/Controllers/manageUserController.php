<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class manageUserController extends Controller
{
    function list(){
        $users = User::where('users.role_as','=',0)->get();
        return view('manageuser', ['users'=>$users]);
    }

    function delete($id){
        $user=User::find($id);
        $user->delete();
        return redirect('manageuser');
    }
}
