<?php

namespace App\Http\Controllers;

use Auth;
use App\Jadwal;
use App\Userdata;
use App\Setting;
use App\Kategori;
use App\Transaksi;
use App\Pembayaran;
use Illuminate\Http\Request;


class SertifikasiController extends Controller
{
  public function kategori(){
    $aa = Setting::get();
    $kategori = Kategori::paginate(9);
    return view('users.sertifikasi.home', ['kategori' => $kategori, 'aa' => $aa]);
  }

  public function jadwal($slug){
    $kategori = Kategori::where('slug', $slug)->first();
    if (!$kategori){ abort(404); }
    $jadwal = Jadwal::where('id_kategori', $kategori->id)->get();
    if (!$jadwal){ abort(404); }
    return view('users.sertifikasi.jadwal', ['jadwal' => $jadwal, 'kategori' => $kategori]);
  }

  public function show_jadwal($slug1, $slug2){
    $aa = Setting::get();
    $kategori = Kategori::where('slug', $slug1)->first();
    if (!$kategori){ abort(404); }
    $jadwal = Jadwal::where('slug', $slug2)->first();
    if (!$jadwal){ abort(404); }
    // die($aa);
    return view('users.sertifikasi.show', ['jadwal' => $jadwal,'kategori' => $kategori, 'aa' => $aa]);
  }

  public function submit(Request $request){
  //   if (Auth::user()->role === 3) {
  //    return redirect(url('operator'));
  //  }elseif(Auth::user()->role === 2) {
  //   return redirect(url('admin'));
  // }elseif(Auth::user()->role === 1) {
    // $transaksi = sizeof(Transaksi::where(['id_user' => Auth::user()->id])->first());
    // $transaksi =  Transaksi::where('id_user', '=', 7)->first();
    // die($transaksi);
    // if($id_jadwal == Auth::user()->id){    
    //   die('dlso');
    //   return redirect(url('pembayaran'));
    // }else{
    // if (Transaksi::where('id_jadwal', '=', $request->id_jadwal)->exists()) {    
    //   return redirect(url('pembayaran'));
    // }
    // else {      
      $t = new Transaksi;
      $t->id_user = Auth::user()->id;
      $t->id_jadwal = $request->id_jadwal;
      $t->save();

      return redirect(url('pembayaran'));
    // }

    // }
  // }
  }
  public function redirect(){
   return redirect(url('pembayaran'));
 }

 public function pembayaran(){
  if (Auth::check()) {
   $transaksi = Transaksi::where(['id_user' => Auth::user()->id])->get();
   // dd($transaksi);
   return view('users.pembayaran.home', ['transaksi' => $transaksi]);
 }else{
  return redirect(url('login'));
}
}

public function pembayaran_next(Request $request){
  if (Auth::check()) {
    $aa = Setting::get();
    $transaksi = Transaksi::where(['id' => $request->id])->firstOrFail();
    if (!$transaksi){ abort(404); }
    return view('users.pembayaran.checkout', ['transaksi' => $transaksi, 'aa' => $aa]);
  }else{
    return redirect(url('login'));
  }
}

public function pembayaran_checkout_save(Request $request){
  $ud = new Userdata;
  $ud->id_transaksi = $request->id_transaksi;
  $ud->pendidikan_terakhir = $request->pendidikan_terakhir;
  $ud->nama = $request->nama;
  $ud->jurusan = $request->jurusan;
  $ud->nama_perusahaan = $request->nama_perusahaan;
  $ud->alamat_perusahaan = $request->alamat_perusahaan;
  $ud->jabatan = $request->jabatan;
  $ud->email_perusahaan = $request->email_perusahaan;
  $ud->save();

  $transaksi = Transaksi::find($request->id_transaksi);
   // $userdata = Userdata::where(['id_transaksi' => $transaksi->id])->firstOrFail();
  $bank = Pembayaran::all();
  $aa = Setting::get();
  return view('users.pembayaran.informasi', ['transaksi' => $transaksi, 'bank' => $bank, 'aa' => $aa]);
}

public function pembayaran_informasi_save(Request $request){
  $bank = $request->bank;
  $id = $request->id;
  $transaksi = Transaksi::find($id);
  $transaksi->id_user = Auth::user()->id;
  $transaksi->id_pembayaran = $bank;
  $transaksi->tipe = 1;
  $transaksi->status = 3;
  $transaksi->save();
  $bank = Pembayaran::where(['id' => $transaksi->id_pembayaran])->first();
  return view('users.pembayaran.konfirmasi', ['transaksi' => $transaksi, 'bank' => $bank]);
}

public function pembayaran_konfirmasi($id){
 if (Auth::check()) {
   // $id = $request->id_transaksi;
  $transaksi = Transaksi::find($id);
  // dd($transaksi);
   // $userdata = Userdata::where(['id_transaksi' => $transaksi->id])->firstOrFail();
  // $bank = Pembayaran::where(['id' => $] )
  return view('users.pembayaran.konfirmasi', ['transaksi' => $transaksi, 'bank' => $bank]);
}else{
  return redirect(url('login'));
}
}

public function pembayaran_delete($id){
  $pembayaran = Transaksi::find($id);    
  $pembayaran->delete();
  return redirect(url('pembayaran'));
}

public function daftar(){
  return redirect(url('pembayaran'));
} 
}
