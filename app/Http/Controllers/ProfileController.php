<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use DateTime;
use App\User;
use App\Setting;
use App\Kategori;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ProfileController extends Controller
{
	public function index(){
		if (!Auth::check()){ return redirect(url('login')); }		
			$id = Auth::user()->id;
			$aa = Setting::get();
			$user = User::find($id);
			$transaksi = Transaksi::where(['id_user' => Auth::user()->id])->orderBy('id','asc')->paginate(1);  
			return view('users.profil.home', ['user' => $user, 'transaksi' => $transaksi, 'aa' => $aa]);			
		}

		public function konfirmasi(){
			if (!Auth::check()) {
				return redirect(url('login'));
			}
			$transaksi = Transaksi::where(['id_user' => Auth::user()->id])->where('status', '=', 3)->get();
			return view('users.profil.konfirmasi', ['transaksi' => $transaksi]);
		}
		public function konfirmasi_save(Request $request){
			$id = $request->id;
			$now = new DateTime();
			$transaksi = Transaksi::find($id);
			$transaksi->tanggal_konfirmasi = $now;
			$transaksi->status = 4;
			$transaksi->photo_bukti = '';
			if($request->hasFile('photo_bukti')){
				$image = date('YmdHis').uniqid().".". $request->photo_bukti->getClientOriginalExtension();
				$request->photo_bukti->move(public_path()."/assets/bukti",$image);
				$transaksi->photo_bukti = $image;
			}
			$transaksi->save();

			return redirect(url('profil/transaksisaya'))->with('sukses', 'Anda telah mengupload bukti transaksi! tunggu 1x24 jam untuk operator memverifikasi bukti Anda');
		}
		public function change_photo($slug){
			if (!Auth::check()) {
				return redirect(url('login'));
			}
			$aa = Setting::get();
			$id = Auth::user()->id;
			$user = User::find($id);
			return view('users.profil.change.photo', ['user' => $user, 'aa' => $aa]);
		}

		public function change_photo_save(Request $request){
			$this->validate($request, [
				'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
			$id = Auth::user()->id;
			$user = User::find($id);
			$user->photo = '';		
			if($request->hasFile('photo')){
				$image = date('YmdHis').uniqid().".". 
				$request->photo->getClientOriginalExtension();
				$request->photo->move(public_path()."/assets/photo",$image);
				$user->photo = $image;
			}
			$user->save();
			return back()->with('sukses', 'Anda berhasil mengubah foto!');
		}

		public function change_email($slug){
			if (!Auth::check()) {
				return redirect(url('login'));
			}
			$aa = Setting::get();
			$id = Auth::user()->id;
			$user = User::find($id);
			return view('users.profil.change.email', ['user' => $user, 'aa' => $aa]);
		}

		public function change_email_save(Request $request){	
			$id = Auth::user()->id;
			$this->validate($request, [
				'email' => 'unique:users,email,'.$id,
			]);

			$user = User::find($id);
			$user->email = $request->email;
			$user->save();		

			return back()->with('sukses', 'Anda berhasil mengubah email!');
		}

		public function change_password($slug){
			if (!Auth::check()) {
				return redirect(url('login'));
			}
			$aa = Setting::get();
			$id = Auth::user()->id;
			$user = User::find($id);
			return view('users.profil.change.password', ['user' => $user, 'aa' => $aa]);
		}

		public function change_password_save(Request $request){
			$a = User::find(Auth::User()->id);
			if (Hash::check($request->oldpw, $a['password']) && $request->newpw == $request->confnewpw) {
				$this->validate($request, [
					'password' => 'required|string|min:6',
				]);
				$a->password = bcrypt($request->newpw);
				$a->save();
				return back()->with('sukses', 'Anda berhasil mengubah password!');
			}else {
				return back()->with('gagal', 'Password yang anda masukan tidak sesuai!');
			}
		}

		public function change_data($slug){
			if (!Auth::check()) {
				return redirect(url('login'));
			}
			$aa = Setting::get();
			$id = Auth::user()->id;
			$user = User::find($id);
			return view('users.profil.change.data', ['user' => $user, 'aa' => $aa]);
		}
		public function change_data_save(Request $request){
			$id = Auth::user()->id;
			$this->validate($request, [
				'username' => 'unique:users,username,'.$id,
			]);
			$user = User::find($id);
			$user->number = $request->number;
			$user->username = strtolower(str_slug($request->username));
			$user->name = $request->name;
			$user->place = $request->place;
			$user->date = $request->date;
			$user->gender = $request->gender;
			$user->religion = $request->religion;
			$user->address = $request->address;
			$user->telp = $request->telp;
			$user->instansi = $request->instansi;
			$user->save();

			return back()->with('sukses', 'Anda berhasil mengubah Data!');
		}

		public function transaksisaya(){
			if (!Auth::check()) {
				return redirect(url('login'));
			}		
			$transaksi = Transaksi::where(['id_user' => Auth::user()->id])->orderBy('id','desc')->paginate(10);      
			return view('users.profil.transaksisaya', ['transaksi' => $transaksi]);	
		}
		public function pdf($id){		
			if (!Auth::check()) {
				return redirect(url('login'));
			}	
			$ss = Setting::first();
			$id_user = Transaksi::find($id)->id_user;			
			$transaksi = Transaksi::where(['id' => $id])->first();						
			if($id_user == Auth::user()->id){					
				$kategori = Kategori::where('id', $transaksi->jadwal->id_kategori)->first();
		// return response()->json($transaksi,200,[],JSON_PRETTY_PRINT);
			// die($transaksi);
				return view('users.profil.pdf', ['transaksi' => $transaksi, 'ss' => $ss, 'kategori' => $kategori]);	
			}else{
				return redirect(url('/'));
			}
		}

	}
