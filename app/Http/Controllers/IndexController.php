<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function index()
  {
    $slider = Slider::all();
    $berita = Berita::orderBy('id', 'desc')->paginate(5);
    return view('index', ['berita' => $berita,'slider' => $slider]);
  }

  public function berita_all(){
    $berita = Berita::paginate(10);
    return view('berita.home', ['berita' => $berita]);
  }

  public function berita_show($slug){
    $berita = Berita::orderBy('slug', $slug)->firstOrFail();
    return view('berita.show', ['berita' => $berita]);
  }

}
