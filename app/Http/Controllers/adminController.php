<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use App\Setting;
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
  public function settings(){
    $setting = Setting::first();
    return view('admin/settings', ['setting' => $setting]);
  }
  public function save_settings(Request $request){
    $s = new Setting;
    $s->nama_web = $request->nama;
    $s->title = $request->title;
    $s->email = $request->email;
    $s->color_web = $request->webcolor;
    $s->color_admin = $request->admincolor;
    $s->color_operator = $request->opcolor;
    $s->facebook = $request->facebook;
    if($request->file('logo') == "")
    {
       $setting = Setting::first();
       $s->logo = $setting->logo;
    }else{
      $s->logo = '';
      if($request->hasFile('logo')){
        $image = date('YmdHis').uniqid().".". $request->logo->getClientOriginalExtension();
        $request->logo->move(public_path()."/assets/logo",$image);
        $s->logo = $image;
      }    
    }    
    if($request->file('favicon') == "")
    {
       $setting = Setting::first();
       $s->favicon = $setting->favicon;
    }else{
      $s->favicon = '';
      if($request->hasFile('favicon')){
        $image = date('YmdHis').uniqid().".". $request->favicon->getClientOriginalExtension();
        $request->favicon->move(public_path()."/assets/logo",$image);
        $s->favicon = $image;
      }    
    }    
    \App\Setting::truncate();
    $s->save();
    return back()->with('sukses', 'Anda berhasil mengubah Data!');
  }
}
