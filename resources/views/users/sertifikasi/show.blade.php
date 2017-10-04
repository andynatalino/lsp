@extends('layouts.users.app')
@section('pageTitle', $jadwal->nama_lsp)

@section('content')
<ul class="breadcrumbs">
  <li><a href="{{ url('/') }}"><span class="icon mif-home"></span></a></li>
  <li><a href="{{ url('/sertifikasi') }}">Sertifikasi</a></li>
  <li><a href="{{ url('/sertifikasi/'.$kategori->slug) }}">{{ $kategori->nama_sp }}</a></li>
  <li><a href="#">{{ $jadwal->nama_lsp }}</a></li>
</ul>

<?php 
$transaksi = App\Transaksi::where(['id_jadwal' => $jadwal->id])->first();
$con = App\Transaksi::where(['id_jadwal' => $jadwal->id, 'status' => 5])->get()->count();  
$kuota = $jadwal->kuota;
?>

<h2>Terdaftar : {{ $con }} / {{ $jadwal->kuota }} Orang</h2>

<h2>Kategori : {{ $kategori->nama_sp }}</h2>
<h2>Jadwal : {{ $jadwal->nama_lsp }}</h2>
<h2>Tanggal Mulai : {{ $jadwal->tanggal_mulai }}</h2>
<h2>Tanggal Selesai : {{ $jadwal->tanggal_selesai }}</h2>
<h2>Waktu : {{ $jadwal->waktu }}</h2>
<h2>Lokasi : {{ $jadwal->lokasi }}</h2>

@if(Auth::check())   
<form action="/pelatihan" method="POST">
  {!! csrf_field() !!}
  <input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}">
  @if($con < $kuota)
  <span class="mif-ani-flash fg-green">Tersedia!</span><br>
  <button class="button loading-pulse">Pilih Pelatihan Sekarang!</button>
</form>
@else
</form>
<span class="mif-ani-horizontal fg-red">Mohon maaf Jadwal sudah penuh!</span><br>
<a href="{{ url('sertifikasi')}}"><button class="button loading-cube">Cari pelatihan yang lain yuk!</button></a>
@endif
@else
@if($con < $kuota)
belom regis
<span class="mif-ani-flash fg-green">Tersedia!</span><br>
<a href="{{ url('login')}}"><button class="button loading-pulse">Pilih Pelatihan Sekarang!</button>
  @else
  <span class="mif-ani-horizontal fg-red">Mohon maaf Jadwal sudah penuh!</span><br>
  <a href="{{ url('sertifikasi')}}"><button class="button loading-cube">Cari pelatihan yang lain yuk!</button></a>
  @endif
  @endif     

  @endsection