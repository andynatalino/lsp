<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
  public function dashboard()
  {
    $data['tasks'] = [
      [
        'name' => 'Design New Dashboard',
        'progress' => '100',
        'color' => 'danger'
      ],
      [
        'name' => 'Create Home Page',
        'progress' => '76',
        'color' => 'warning'
      ],
      [
        'name' => 'Some Other Task',
        'progress' => '32',
        'color' => 'success'
      ],
      [
        'name' => 'Start Building Website',
        'progress' => '56',
        'color' => 'info'
      ],
      [
        'name' => 'Develop an Awesome Algorithm',
        'progress' => '100',
        'color' => 'success'
      ]
    ]; 
    return view('admin.dashboard')->with($data);
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
