<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Berita;
use App\Jadwal;
use App\Slider;
use App\Kategori;
use Illuminate\Http\Request;

class opController extends Controller
{
  public function index(){
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
        'progress' => '10',
        'color' => 'success'
      ]
    ];
    return view('operator2.dashboard')->with($data);
  }

  public function dashboard(){
    return view('operator.dashboard');
  }

  public function berita(){
    $berita = Berita::all();
    return view('operator2.berita.all', ['berita' => $berita]);
  }

  public function buat_berita(){
    return view('operator2.berita.buat');
  }

  public function berita_save(Request $request){
    $a = new Berita;
    $a->id_user = Auth::user()->id;
    $a->judul = $request->judul;
    $a->slug = $request->judul;
    $a->isi = $request->isi;
    $a->save();

    return redirect(url('operator/berita'));
  }

  public function berita_edit($id){
    $berita = Berita::find($id);
    return view('operator2.berita.edit', ['berita' => $berita]);
  }

  public function berita_update(Request $request, $id){
    $a = Berita::find($id);
    $a->id_user = Auth::user()->id;
    $a->judul = $request->judul;
    $a->slug = $request->judul;
    $a->isi = $request->isi;
    $a->save();

    return redirect(url('operator/berita'));
  }

  public function berita_delete($id){
    $a = Berita::find($id);
    $a->delete();
    return redirect('operator/berita');
  }

  public function slider_all(){
    $slider = Slider::all();
    return view('operator.slider.all', ['slider' => $slider]);
  }

  public function buat_slider(){
    return view('operator.slider.buat');
  }

  public function save_slider(Request $request){
    $op = new Slider;
    $op->id_user = Auth::user()->id;
    $op->nama_slider = $request->nama_slider;
    $op->gambar = '';
    if($request->hasFile('gambar')){
      $gambar = date('YmdHis').uniqid().".". $request->gambar->getClientOriginalExtension();
      // die($gambar);
      Image::make($request->gambar)->resize(600, 400)->save(public_path("/assets/slider/". $gambar));
      $op->gambar = $gambar;
    }
    $op->save();

    return redirect(url('operator/slider'));
  }

  public function kategori_all(){
    $kategori = Kategori::paginate(10);
    if (!$kategori){ abort(404); }
    return view('operator2.kategori.all', ['kategori' => $kategori]);
  }


  public function kategori_buat(){
    return view('operator2.kategori.buat');
  }

  public function kategori_save(Request $request){
    $kategori = new Kategori;
    $kategori->nama_sp = $request->nama;
    $kategori->isi = $request->isi;
    $kategori->slug = str_slug($request->nama);
    $kategori->image = '';
    if($request->hasFile('image')){
      $image = date('YmdHis').uniqid().".". $request->image->getClientOriginalExtension();
      // die($gambar);
      Image::make($request->image)->resize(600, 400)->save(public_path("/assets/kategori/". $image));
      $kategori->image = $image;
    }
    $kategori->save();

    return redirect(url('operator/kategori'));
  }

  public function kategori_show(){
    return redirect('operator/kategori');
  }

  public function kategori_edit($id){
    $kategori = Kategori::find($id);
    return view('operator2.kategori.edit', ['kategori' => $kategori]);
  }

  public function kategori_update(Request $request, $id){
    $kategori = Kategori::find($id);
    $kategori->nama_sp = $request->nama;
    $kategori->isi = $request->isi;
    $kategori->slug = str_slug($request->nama);
    $kategori->image = '';
    if($request->hasFile('image')){
      $image = date('YmdHis').uniqid().".". $request->image->getClientOriginalExtension();
      Image::make($request->image)->resize(600, 400)->save(public_path("/assets/kategori/". $image));
      $kategori->image = $image;
    }
    $kategori->save();
    return redirect('operator/kategori');
  }

  public function kategori_delete($id){
    $kategori = Kategori::find($id);
    $kategori->delete();
    return redirect('operator/kategori');
  }

  public function jadwal_all(){
    $jadwal = Jadwal::paginate(10);
    if (!$jadwal){ abort(404); }
    return view('operator2.jadwal.all', ['jadwal' => $jadwal]);
  }
  public function jadwal_buat(){
    $kategori = Kategori::all();
    return view('operator2.jadwal.buat', ['kategori' => $kategori]);
  }

  public function jadwal_save(Request $request){
    $jadwal = new Jadwal;
    $jadwal->id_kategori = $request->id_kategori;
    $jadwal->nama_lsp = $request->nama_lsp;
    $jadwal->tanggal_mulai = $request->tanggal_mulai;
    $jadwal->tanggal_selesai = $request->tanggal_selesai;
    $jadwal->waktu = $request->waktu;
    $jadwal->lokasi = $request->lokasi;
    $jadwal->kuota = $request->kuota;
    $jadwal->biaya = $request->biaya;
    $jadwal->isi = $request->isi;
    $jadwal->status = $request->status;
    $jadwal->slug = str_slug($request->nama_lsp);
    $jadwal->image = '';
    if($request->hasFile('image')){
      $image = date('YmdHis').uniqid().".". $request->image->getClientOriginalExtension();
      Image::make($request->image)->resize(600, 400)->save(public_path("/assets/jadwal/". $image));
      $jadwal->image = $image;
    }
    $jadwal->save();

    return redirect(url('operator/jadwal'));
  }

  public function jadwal_edit($id){
    $jadwal = Jadwal::find($id);
    $kategori = Kategori::all();
    return view('operator2.jadwal.edit', ['jadwal' => $jadwal, 'kategori' => $kategori]);
  }

  public function jadwal_update(Request $request, $id){
    $jadwal = Jadwal::find($id);
    $jadwal->id_kategori = $request->id_kategori;
    $jadwal->nama_lsp = $request->nama_lsp;
    $jadwal->tanggal_mulai = $request->tanggal_mulai;
    $jadwal->tanggal_selesai = $request->tanggal_selesai;
    $jadwal->waktu = $request->waktu;
    $jadwal->lokasi = $request->lokasi;
    $jadwal->kuota = $request->kuota;
    $jadwal->biaya = $request->biaya;
    $jadwal->isi = $request->isi;
    $jadwal->status = $request->status;
    $jadwal->slug = str_slug($request->nama_lsp);
    $jadwal->image = '';
    if($request->hasFile('image')){
      $image = date('YmdHis').uniqid().".". $request->image->getClientOriginalExtension();
      Image::make($request->image)->resize(600, 400)->save(public_path("/assets/jadwal/". $image));
      $jadwal->image = $image;
    }
    $jadwal->save();

    return redirect(url('operator/jadwal'));
  }

  public function jadwal_delete($id){
    $jadwal = Jadwal::find($id);
    $jadwal->delete();
    return redirect(url('operator/jadwal'));
  }

}
