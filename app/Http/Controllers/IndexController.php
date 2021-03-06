<?php

namespace App\Http\Controllers;

use App\galeri;
use App\Berita;
use App\kontak;
use App\Slider;
use App\tentang;
use App\Setting;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function index(){

    $aa = Setting::get();
    $slider = Slider::all();
    $berita = Berita::orderBy('id', 'desc')->paginate(5);
    return view('users.index', ['berita' => $berita,'slider' => $slider, 'aa' => $aa]);
  }

  public function berita_all(){
    $aa = Setting::get();
    $berita = Berita::orderBy('id', 'desc')->paginate(5);
    return view('users.berita.home', ['berita' => $berita, 'aa' => $aa]);
  }

  public function berita_show($slug){
    // $berita = Berita::orderBy('slug', $slug)->first();
    $berita = Berita::whereSlug($slug)->first();
    return view('users.berita.show', ['berita' => $berita]);
  }

  public function tentang_show($slug){
    $tentang = tentang::whereSlug($slug)->first();
    return view('users.tentang.tentang', ['tentang' => $tentang]);
  }

  public function kontak(){
   $aa = Setting::get();
   return view('users.kontak.kontak', ['aa' => $aa]);
 }

 public function kontak_save(Request $request){
  $kontak = new kontak;
  $kontak->nama = $request->nama;
  $kontak->email = $request->email;
  $kontak->telp = $request->telp;
  $kontak->isi = $request->isi;
  $kontak->save();

  return back()->with('sukses', 'Terima Kasih telah menghubungi layanan kami. Kami akan segera membalas pesan Anda.'); 
}

public function galeri(){
  $aa = Setting::get();
  $galeri = galeri::paginate(9);  
  return view('users.galeri.galeri', ['galeri' => $galeri, 'aa' => $aa]);
}

}
