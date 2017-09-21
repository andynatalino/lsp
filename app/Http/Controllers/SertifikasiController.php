<?php

namespace App\Http\Controllers;

use Auth;
use App\Jadwal;
use App\Userdata;
use App\Kategori;
use App\Transaksi;
use App\Pembayaran;
use Illuminate\Http\Request;

class SertifikasiController extends Controller
{
  public function kategori(){
    $kategori = Kategori::paginate(9);
    return view('users.sertifikasi.home', ['kategori' => $kategori]);
  }

  public function jadwal($slug){
    $kategori = Kategori::where('slug', $slug)->first();
    if (!$kategori){ abort(404); }
    $jadwal = Jadwal::where('id_kategori', $kategori->id)->get();
    if (!$jadwal){ abort(404); }
    return view('users.sertifikasi.jadwal', ['jadwal' => $jadwal, 'kategori' => $kategori]);
  }

  public function show_jadwal($slug1, $slug2){
    $kategori = Kategori::where('slug', $slug1)->first();
    if (!$kategori){ abort(404); }
    $jadwal = Jadwal::where('slug', $slug2)->first();
    if (!$jadwal){ abort(404); }
    return view('users.sertifikasi.show', ['jadwal' => $jadwal,'kategori' => $kategori]);
  }

  public function submit(Request $request){
    $t = new Transaksi;
    $t->id_user = Auth::user()->id;
    $t->id_jadwal = $request->id_jadwal;
    $t->save();

    return redirect(url('pembayaran'));
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

public function pembayaran_checkout(Request $request){
  if (Auth::check()) {
   $transaksi = Transaksi::where(['id' => $request->id])->firstOrFail();
   if (!$transaksi){ abort(404); }
   return view('users.pembayaran.checkout', ['transaksi' => $transaksi]);
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
  return view('users.pembayaran.informasi', ['transaksi' => $transaksi, 'bank' => $bank]);
}



public function pembayaran_informasi_save(Request $request){
  $bank = $request->bank;
  $id = $request->id;
  $transaksi = Transaksi::find($id);
  $transaksi->id_user = Auth::user()->id;
  $transaksi->id_pembayaran = $bank;
  $transaksi->save();
  $bank = Pembayaran::where(['id' => $transaksi->id_pembayaran])->first();
  return view('users.pembayaran.konfirmasi', ['transaksi' => $transaksi, 'bank' => $bank]);
}

public function pembayaran_konfirmasi($id){
 if (Auth::check()) {
   // $id = $request->id_transaksi;
  $transaksi = Transaksi::find($id);
  dd($transaksi);
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
