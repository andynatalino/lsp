@extends('layouts.users.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')

<a href="{{ url('/sertifikasi/lsp-mouse'.-time()) }}">asdas</a>
<div class="grid">
  <div class="row cells12">
    <div class="cell colspan8">
      <div class="carousel" data-role="carousel" data-height="450" data-control-next="<span class='mif-chevron-right'></span>" data-control-prev="<span class='mif-chevron-left'></span>">
        @foreach($slider as $key)
        <div class="slide"><img  src="{{ url('assets/slider/'.$key->gambar) }}" data-role="fitImage" data-format="fill"></div>
        @endforeach
        @if(sizeof($slider)==0)    
      <span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Slider Kosong!</span>
      @endif
      </div>
      <hr>
      @foreach($berita as $key)
      <div class="panel">
        <div class="heading">
          <span class="title">{{ $key->judul }}</span>
        </div>
        <div class="content" style="padding: 10px 10px 10px 10px;">
          {!! str_limit($key->isi, 500) !!}
          <br>
          <br>
          <span class="place-right">Lanjutkan Membaca</span><br>
        </div>
      </div><br>
      @endforeach
      @if(sizeof($berita)==0)    
      <span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Berita Kosong!</span>
      @endif
    </div>

    <div class="cell colspan4">
      <div class="panel danger">
        <div class="heading">
          <span class="title">Login</span>
        </div>
        <div class="content" style="padding: 10px 10px 10px 10px;">
          Login atau Register
          <hr>
          <span class="place-right"><a href="{{ url('login') }}" class="button">Login</a> or <a href="{{ url('register') }}" class="button">Register</a></span>
          <div style="margin-top:30px;">&nbsp;</div>
        </div>
      </div>
    </div>
    <img  src="">
  </div>
  {{ $berita->links() }}
</div>
@endsection
