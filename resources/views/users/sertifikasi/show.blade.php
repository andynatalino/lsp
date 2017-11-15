@extends('layouts.users.app')
@section('pageTitle', $jadwal->nama_lsp)

@section('content') 
<?php 
$transaksi = App\Transaksi::where(['id_jadwal' => $jadwal->id])->first();
$con = App\Transaksi::where(['id_jadwal' => $jadwal->id, 'status' => 5])->get()->count();  
$kuota = $jadwal->kuota;
?>
<div class="grid">
  <ul class="breadcrumbs">
    <li><a href="{{ url('/') }}"><span class="icon mif-home"></span></a></li>
    <li><a href="{{ url('/sertifikasi') }}">Sertifikasi</a></li>
    <li><a href="{{ url('/sertifikasi/'.$kategori->slug) }}">{{ $kategori->nama_sp }}</a></li>
    <li><a href="#">{{ $jadwal->nama_lsp }}</a></li>
  </ul>
  <div class="row cells12">
    <div class="cell colspan8">      
      <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
     <div class="heading">
      <span class="title">Rincian Sertifikasi</span>
    </div>
    <div class="content" style="padding: 10px 10px 10px 10px;">
      <table>
        <tr>
          <td><h5>Kategori</h5></td>
          <td>: {{ $kategori->nama_sp }}</td>
        </tr>
        <tr>
          <td><h5>Terdaftar</h5></td> 
          <td>: {{ $con }} / {{ $jadwal->kuota }} Orang</td>
        </tr>
        <tr>
          <td><h5>Skema</h5></td>
          <td>: {{ $jadwal->nama_lsp }}</td>
        </tr>
        <tr>
          <td><h5>Tanggal</h5></td>
          <td>: {{ date('j F Y', strtotime($jadwal->tanggal_mulai)) }} s/d {{ date('j F Y', strtotime($jadwal->tanggal_selesai)) }}</td>
        </tr>
        <tr>
          <td><h5>Waktu</h5></td>
          <td>: {{ $jadwal->waktu }}</td>
        </tr>
        <tr>
          <td><h5>Lokasi</h5></td>
          <td>: {{ $jadwal->lokasi }}</td>
        </tr>
        <tr>  
          <td><h5>Isi</h5></td>          
          <td><p>: {{ $jadwal->isi }}</p></td>
        </tr>
      </table>
    </div>
  </div>
</div>

<div class="cell colspan4">
  <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
    <div class="heading">
      <span class="title">Opsi</span>
    </div>
    <div class="content" style="padding: 10px 10px 10px 10px;">

      @if(Auth::check())   
      <form action="{{ url('pelatihan')}}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}">
        @if($con < $kuota)
        <h3>Rp. {{ $jadwal->biaya }},-</h3>
        <span class="mif-ani-flash fg-green"><h5>Tersedia!</h5></span><br>
        <button class="button loading-pulse">Pilih Pelatihan Sekarang!</button>
      </form>
      @else
    </form>
    <h3>Rp. {{ $jadwal->biaya }},-</h3>
    <span class="mif-ani-horizontal fg-red"><h5>Mohon maaf Jadwal sudah penuh!</h5></span><br>
    <a href="{{ url('sertifikasi')}}"><button class="button loading-cube">Cari pelatihan yang lain yuk!</button></a>
    @endif
    @else
    @if($con < $kuota)
    <h3>Rp. {{ $jadwal->biaya }},-</h3>
    <span class="mif-ani-flash fg-green"><h5>Tersedia!</h5></span><br>
    <a href="{{ url('login')}}"><button class="button loading-pulse">Pilih Pelatihan Sekarang!</button>
      @else
      <h3>Rp. {{ $jadwal->biaya }},-</h3>
      <span class="mif-ani-horizontal fg-red"><h5>Mohon maaf Jadwal sudah penuh!</h5></span><br>
      <a href="{{ url('sertifikasi')}}"><button class="button loading-cube">Cari pelatihan yang lain yuk!</button></a>
      @endif
      @endif 

    </div>
  </div>
</div>
</div>
</div>
@endsection