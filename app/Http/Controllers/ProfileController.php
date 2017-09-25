<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use DateTime;
use App\User;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{

	public function index(){
		if (Auth::check()) {
			$id = Auth::user()->id;
			$user = User::find($id);
			return view('users.profil.home', ['user' => $user]);
		}else{
			return redirect(url('login'));
		}	
	}

	public function konfirmasi(){
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
			Image::make($request->photo_bukti)->save(public_path("/assets/bukti/". $image));
			$transaksi->photo_bukti = $image;
		}
		$transaksi->save();

		die('berhasil');
	}
}
