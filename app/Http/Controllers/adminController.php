<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
  public function dashboard()
  {
    return view('admin.dashboard');
  }
  public function users_all()
  {
    $users = User::all();
    return view('admin.users.all', ['users' => $users]);
  }
  public function show($id)
  {
    $user = User::where('number', $id)->first();
    return view('admin.users.show', ['user' => $user]);
  }
}
