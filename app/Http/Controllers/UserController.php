<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view('users.profil.home', ['user' => $user]);	
    }
}
