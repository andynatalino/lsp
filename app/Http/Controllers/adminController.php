<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use Image;
use App\User;
use App\galeri;
use App\tentang;
use App\Setting;
use Illuminate\Http\Request;

class adminController extends Controller
{
  public function dashboard(){
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

  public function user(){
    if (!Auth::check()){ return abort(404); }
      $users = User::orderBy('created_at', 'desc')->get();
      if (!$users){ return abort(404); }
      return view('admin.users.all', ['users' => $users]);
    }
    public function buat_user(){
      return view('admin.users.buat');
    }

    public function user_save(Request $request){
      $id = Auth::user()->id;
      $this->validate($request, [
       'number' => 'unique:users,number,'.$id,
       'username' => 'unique:users,username,'.$id,
       'password' => 'required|string|min:6',
       'repassword' => 'required|same:password',
       'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     ]);
      $user = new User;
      $user->number = $request->number;
      $user->username = strtolower(str_slug($request->username));
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->instansi = $request->instansi;
      $user->gender = $request->gender;
      $user->place = $request->place;
      $user->date = $request->date;
      $user->religion = $request->religion;
      $user->citizenship = $request->citizenship;
      $user->telp = $request->telp;
      $user->address = $request->address;
      $user->role = $request->role;
      $user->photo = '';
      if($request->hasFile('photo')){
        $image = date('YmdHis').uniqid().".".
        $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path()."/assets/photo",$image);
        $user->photo = $image;
      }
      $user->save();
      return redirect(url('admin/user'));

    }

    public function user_delete($id){
      $users = User::find($id);
  //validasi jika dia menhapus dirinya sendiri maka akan muncul pesan "anda tidak bisa menghapus diri anda sendiri"
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
    public function tentang(){
      if (!Auth::check()){ return abort(404); }
        $tentang = tentang::get();
        if (!$tentang){ return abort(404); }
        return view('admin.tentang.all', ['tentang' => $tentang]);
      }

      public function buat_tentang(){
       return view('admin.tentang.buat');
     }

     public function tentang_save(Request $request){
      if ($request->isi == '') {
       return back()->with('gagal', 'Anda tidak bisa mengisi data kosong!');
     }
     $tentang = new tentang;
     $tentang->judul = $request->judul;
     $tentang->tentang = $request->isi;
     $tentang->save();
     return redirect('admin/tentang');
   }

   public function tentang_edit($id){
      $tentang = tentang::find($id);
      return view('admin.tentang.edit', ['tentang' => $tentang]);
   }

   public function tentang_update(Request $request, $id){
      if ($request->isi == '') {
       return back()->with('gagal', 'Anda tidak bisa mengisi data kosong!');
     }
     $tentang = tentang::find($id);
     $tentang->judul = $request->judul;
     $tentang->tentang = $request->isi;
     $tentang->save();
     return redirect('admin/tentang');
   }

   public function tentang_delete($id){
     $tentang = tentang::find($id);
     $tentang->delete();
     return redirect('admin/tentang');
   }

   public function galeri() {
    if (!Auth::check()){ return abort(404); }
      $galeri = galeri::all();
      if (!$galeri){ return abort(404); }
      return view('admin.galeri.all', ['galeri' => $galeri]);
    }
  }
