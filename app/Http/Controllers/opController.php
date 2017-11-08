<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use DateTime;
use Validator;
use App\User;
use App\Berita;
use App\Jadwal;
use App\Slider;
use App\Kategori;
use App\Transaksi;
use App\Pembayaran;
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
    return view('operator.dashboard')->with($data);
  }

  public function dashboard(){
    return view('operator.dashboard');
  }

  public function berita(){    
    $berita = Berita::orderBy('id','desc')->paginate(10); 
    return view('operator.berita.all', ['berita' => $berita]);
  }

  public function berita_search(Request $request){
    $query = $request->q;
    $berita = Berita::where('judul','like','%'.$query.'%')->orderBy('id','asc')->paginate(10);      
    return view('operator.berita.search', ['berita' => $berita, 'query' => $query]); 
  }

  public function buat_berita(){
    return view('operator.berita.buat');
  }

  public function berita_gambar(Request $r)
  {
    $upload = $r->file('upload');
    $funcNum = $r->input('CKEditorFuncNum');

    $validator = Validator::make($r->all(),[
      'upload'=>'mimetypes:image/png,image/jpg,image/jpeg,image/bmp',
    ]);

    if ($validator->fails()) {
      return '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$funcNum.'", "", "Gambar hanya bisa berformat .png, .jpg, .jpeg dan .bmp.");</script>';
    }

    $ext = $upload->getClientOriginalExtension();
    $random = round(microtime(true)).str_random(40);
    $upload->move('assets/berita',$random.'.'.$ext);      
    $funcNum = $r->input('CKEditorFuncNum');
    $CKEditor = $r->input('CKEditor');
    $langCode = $r->input('langCode');
    $message = '';
    $url = $url = url('assets/berita'.'/'.$random.'.'.$ext);
    return '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$funcNum.'", "'.$url.'", "'.$message.'");</script>';
  }

  public function berita_save(Request $request){
    if ($request->isi == '') {
     return back()->with('gagal', 'Anda tidak bisa mengisi berita kosong!');
   }
   $a = new Berita;
   $a->id_user = Auth::user()->id;
   $a->judul = $request->judul;
   $a->slug = str_slug($request->judul);
   $a->isi = $request->isi;
   $a->save();
   return redirect(url('operator/berita'));
 }

 public function berita_edit($id){
  $berita = Berita::find($id);
  return view('operator.berita.edit', ['berita' => $berita]);
}

public function berita_update(Request $request, $id){
  $a = Berita::find($id);
  $a->id_user = Auth::user()->id;
  $a->judul = $request->judul;
  $a->slug = str_slug($request->judul);
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
  $op->nama_slider = $request->nama;
  $op->gambar = '';
  if($request->hasFile('gambar')){
    $gambar = date('YmdHis').uniqid().".". $request->gambar->getClientOriginalExtension();
    Image::make($request->gambar)->save(public_path("/assets/slider/". $gambar));
    $op->gambar = $gambar;
  }
  $op->save();
  return redirect(url('operator/slider'));
}

public function slider_edit($id){
  $slider = Slider::find($id);
  return view('operator.slider.edit', ['slider' => $slider]);
}

public function slider_update(Request $request, $id){
  $slider = Slider::find($id);
  $slider->nama_slider = $request->nama;
  $slider->gambar = '';
  if($request->hasFile('gambar')){
    $gambar = date('YmdHis').uniqid().".". $request->gambar->getClientOriginalExtension();
    Image::make($request->gambar)->resize(600, 400)->save(public_path("/assets/slider/". $gambar));
    $slider->gambar = $gambar;
  }
  $slider->save();
  return redirect(url('operator/slider'));
}

public function slider_delete($id){
  $slider = Slider::find($id);
  $slider->delete();
  return redirect(url('operator/slider'));
}

public function kategori_all(){
  $kategori = Kategori::orderBy('id','desc')->paginate(10);     
  if (!$kategori){ abort(404); }
  return view('operator.kategori.all', ['kategori' => $kategori]);
}

public function kategori_search(Request $request){
  $query = $request->q;
  $kategori = Kategori::where('nama_sp','like','%'.$query.'%')->orderBy('id','asc')->paginate(10);      
  return view('operator.kategori.search', ['kategori' => $kategori, 'query' => $query]); 
}

public function kategori_buat(){
  return view('operator.kategori.buat');
}

public function kategori_save(Request $request){
  $kategori = new Kategori;
  $kategori->nama_sp = $request->nama;
  $kategori->isi = $request->isi;
  $kategori->slug = str_slug($request->nama);    
  $kategori->image = '';
  if($request->hasFile('image')){
    $image = date('YmdHis').uniqid().".".
    $request->image->getClientOriginalExtension();
    $request->image->move(public_path()."/assets/kategori",$image);
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
  return view('operator.kategori.edit', ['kategori' => $kategori]);
}

public function kategori_update(Request $request, $id){
  $kategori = Kategori::find($id);
  $kategori->nama_sp = $request->nama;
  $kategori->isi = $request->isi;
  $kategori->slug = str_slug($request->nama);
  if($request->file('image') == "")
  {
    $kategori->image = $kategori->image;
  } else{
    $kategori->image = '';
    if($request->hasFile('image')){
      $image = date('YmdHis').uniqid().".".
      $request->image->getClientOriginalExtension();
      $request->image->move(public_path()."/assets/kategori",$image);
      $kategori->image = $image;
    }
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
  $jadwal = Jadwal::orderBy('id','desc')->paginate(10);     
  if (!$jadwal){ abort(404); }
  return view('operator.jadwal.all', ['jadwal' => $jadwal]);
}

public function jadwal_search(Request $request){
  $query = $request->q;
  $jadwal = Jadwal::where('nama_lsp','like','%'.$query.'%')->orderBy('id','asc')->paginate(10);      
  return view('operator.jadwal.search', ['jadwal' => $jadwal, 'query' => $query]); 
}
public function jadwal_buat(){
  $kategori = Kategori::all();
  return view('operator.jadwal.buat', ['kategori' => $kategori]);
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
  // $jadwal->image = '';
  // if($request->hasFile('image')){
  //   $image = date('YmdHis').uniqid().".". $request->image->getClientOriginalExtension();
  //   Image::make($request->image)->resize(600, 400)->save(public_path("/assets/jadwal/". $image));
  //   $jadwal->image = $image;
  // }
  $jadwal->save();
  return redirect(url('operator/jadwal'));
}

public function jadwal_edit($id){
  $jadwal = Jadwal::find($id);
  $kategori = Kategori::all();
  return view('operator.jadwal.edit', ['jadwal' => $jadwal, 'kategori' => $kategori]);
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
  $jadwal->save();

  return redirect(url('operator/jadwal'));
}

public function jadwal_delete($id){
  $jadwal = Jadwal::find($id);
  $jadwal->delete();
  return redirect(url('operator/jadwal'));
}

public function pembayaran_all(){
  $tipe = Pembayaran::all();
  return view('operator.pembayaran.all', ['tipe' => $tipe]);
}

public function pembayaran_buat(){
  return view('operator.pembayaran.buat');
}

public function pembayaran_save(Request $request){
  $tipe = new Pembayaran;
  $tipe->nama_bank = $request->nama_bank;
  $tipe->no_rek = $request->no_rek;
  $tipe->atas_nama = $request->atas_nama;
  $tipe->save();
  return redirect(url('operator/pembayaran'));
}

public function pembayaran_edit($id){
  $tipe = Pembayaran::find($id);
  return view('operator.pembayaran.edit', ['tipe' => $tipe]);
}

public function pembayaran_update(Request $request, $id){
  $tipe = Pembayaran::find($id);
  $tipe->nama_bank = $request->nama_bank;
  $tipe->no_rek = $request->no_rek;
  $tipe->atas_nama = $request->atas_nama;
  $tipe->save();
  return redirect('operator/pembayaran');
}

public function pembayaran_delete($id){
  $tipe = Pembayaran::find($id);
  $tipe->delete();
  return redirect(url('operator/pembayaran'));
}

public function konfirmasi_bank(){
  $transaksi = Transaksi::orderBy('created_at', 'desc')
  ->where('tipe', '=', 1)->where('status', '=', 4)->paginate(10);
  return view('operator.konfirmasi.bank', ['transaksi' => $transaksi]);
}

public function search_bank(Request $request){
  $query = $request->q;
  $transaksi = Transaksi::where('id','like','%'.$query.'%')->where('status', '=', 4)->orderBy('id','asc')->paginate(10);
  return view('operator.konfirmasi.search_bank', ['transaksi' => $transaksi, 'query' => $query]); 
}

public function konfirmasi_tunai(){
  $transaksi = Transaksi::orderBy('created_at', 'desc')
  ->where('tipe', '=', 2)->where('status', '=', 4)->get();
  return view('operator.konfirmasi.tunai', ['transaksi' => $transaksi]);
}

public function konfirmasi_update($id){
  $now = new DateTime();
  $transaksi = Transaksi::find($id);
  $transaksi->status = 5;
  $transaksi->tanggal_transaksi = $now;
  $transaksi->save();
  return redirect('operator/konfirmasi');
}

public function konfirmasi_delete($id){
  $transaksi = Transaksi::find($id);
  $transaksi->delete();
  return redirect('operator/konfirmasi');
}

public function transaksi_all(){
  $transaksi = Transaksi::orderBy('created_at', 'desc')->where('status', '=', 5)->get();
  return view('operator.transaksi.all', ['transaksi' => $transaksi]);
}
}
