@extends('layouts.users.app')
@section('pageTitle', 'Checkout')

@section('content')
<div class="grid">
  <div class="row cells12">
    <div class="cell colspan8">      
      <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
        <div class="heading">
          <span class="title">Isi Data Pendaftaran</span>
        </div>
        <div class="content" style="padding: 10px 10px 10px 10px;">
          <form action="{{ url('pembayaran/checkout') }}" method="post">
            <label>Pendidikan Terakhir :</label>
            <div class="input-control text full-size" data-role="input">
              <input type="text" name="pendidikan_terakhir" value="" required>              
            </div>
            <label>Nama Sekolah / Perguruan Tinggi :</label>
            <div class="input-control text full-size" data-role="input">
              <input type="text" name="nama" value="" required>              
            </div>
            <label>Jurusan :</label>
            <div class="input-control text full-size" data-role="input">
              <input type="text" name="jurusan" value="" required>              
            </div>
            <label>Nama Perusahaan :</label>
            <div class="input-control text full-size" data-role="input">
              <input type="text" name="nama_perusahaan" value="" required>              
            </div>
            <label>Alamat Perusahaan :</label>
            <div class="input-control textarea full-size">
              <textarea name="alamat_perusahaan" required></textarea>
            </div>
            <label>Jabatan :</label>
            <div class="input-control text full-size" data-role="input">
              <input type="text" name="jabatan" value="" required>              
            </div>
            <label>Email Perusahaan :</label>
            <div class="input-control text full-size" data-role="input">
              <input type="email" name="email_perusahaan" value="" required>      
              <input type="hidden" name="id_transaksi" value="{{ $transaksi->id }}">     
              {{ csrf_field() }}   
            </div>         

          </div>
        </div>
      </div>   

      <div class="cell colspan4">
       <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
        <div class="heading">
          <span class="title">Rincian Pembayaran</span>
        </div>
        <div class="content" style="padding: 10px 10px 10px 10px;">
          <center><h2>{{ $transaksi->jadwal->nama_lsp }}</h2><br></center>
          <h5>
            {{ date('j F Y', strtotime($transaksi->jadwal->tanggal_mulai)) }} / {{ date('j F Y', strtotime($transaksi->jadwal->tanggal_selesai)) }}</h5><br>
            <h5>{{ $transaksi->jadwal->waktu }}</h5>
            <h5>Rp. {{ $transaksi->jadwal->biaya }},-</h5>
            <button class="button place-right">Lanjutkan</button><br><br><br>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
