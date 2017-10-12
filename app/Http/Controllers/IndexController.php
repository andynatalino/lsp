<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Slider;
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
    $berita = Berita::paginate(10);
    return view('users.berita.home', ['berita' => $berita, 'aa' => $aa]);
  }

  public function berita_show($slug){
    $berita = Berita::orderBy('slug', $slug)->firstOrFail();
    return view('users.berita.show', ['berita' => $berita]);
  }

}
