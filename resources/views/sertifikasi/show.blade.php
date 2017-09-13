@extends('layouts.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')

<h2>Kategori : {{ $kategori->nama_sp }}</h2>
<h2>Jadwal : {{ $jadwal->nama_lsp }}</h2>
<h2>{{ $jadwal->tanggal_mulai }}</h2>
<h2>{{ $jadwal->tanggal_selesai }}</h2>
<h2>{{ $jadwal->waktu }}</h2>
<h2>{{ $jadwal->lokasi }}</h2>
<h2>{{ $jadwal->kuota }}</h2>
<h2>{{ $jadwal->status }}</h2>

<a href="{{ url('/register') }}"><button type="button" name="button">Pilih Pelatihan</button></a>


  <!-- <div class="row cells3">
    <div class="cell">
      <div class="panel alert">
        <div class="heading">
          <span class="title">Panel Title</span>
        </div>
        <div class="content padding10">
          <div class="panel image-container">
            <div class="frame"><img src="http://it-club.smkn10jakarta.sch.id/images/logo.png"></div>
          </div>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>

    <div class="cell">
      <div class="panel warning">
        <div class="heading">
          <span class="title">Panel Title</span>
        </div>
        <div class="content padding10">
          <div class="panel image-container">
            <div class="frame"><img src="http://it-club.smkn10jakarta.sch.id/images/logo.png"></div>
          </div>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </div>
    </div>

    <div class="cell">
      <div class="panel success">
        <div class="heading">
          <span class="title"><a href="/komputer" style="color: white;">LSP Komputer</a></span>
        </div>
        <div class="content padding10">
          <div class="cell colspan4">
            <div class="panel image-container">
              <div class="frame"><img src="http://atstockillustration.com/1024/vector-illustration-of-a-mad-muscular-tiger-man-punching-by-atstockillustration-5870.jpg" style="height:50%; width:100%;"></div>
            </div>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
        </div>
      </div>
    </div> -->
  </div>
  @endsection
