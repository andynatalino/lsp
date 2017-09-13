<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Kategori;
use Illuminate\Http\Request;

class SertifikasiController extends Controller
{
  public function kategori()
  {
    $kategori = Kategori::paginate(9);
    return view('sertifikasi.home', ['kategori' => $kategori]);
  }

  public function jadwal($slug)
  {
    $kategori = Kategori::where('slug', $slug)->first();
    if (!$kategori){ abort(404); }
    $jadwal = Jadwal::where('id_kategori', $kategori->id)->paginate(5);
    if (!$jadwal){ abort(404); }
    return view('sertifikasi.jadwal', ['jadwal' => $jadwal, 'kategori' => $kategori]);
  }

  public function show_jadwal($slug1, $slug2){
    $kategori = Kategori::where('slug', $slug1)->first();
    if (!$kategori){ abort(404); }
    $jadwal = Jadwal::where('slug', $slug2)->first();
    if (!$jadwal){ abort(404); }
    return view('sertifikasi.show', ['jadwal' => $jadwal,'kategori' => $kategori]);
  }

}
