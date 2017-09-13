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

}
