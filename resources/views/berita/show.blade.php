@extends('layouts.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')

<div class="grid">
    <div class="row">
        <div class="cell">
          <h1>{{ $berita->judul }}</h1>
          <a href="{{ url('/register') }}"><button type="button" name="button">Pilih Pelatihan</button></a>

        </div>
    </div>
</div>


  @endsection
