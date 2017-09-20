@extends('layouts.users.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')
<div class="grid">
  <div class="row cells12">
    <div class="cell colspan8">      
      <div class="panel danger">
        <div class="heading">
          <span class="title">Isi Data Pendaftaran</span>
        </div>
        <div class="content" style="padding: 10px 10px 10px 10px;">
          <label>Pendidikan Terakhir :</label>
          <div class="input-control text full-size" data-role="input">
            <input type="text" name="namabelakang" value="" required>              
          </div>
          <label>Nama Sekolah / Perguruan Tinggi :</label>
          <div class="input-control text full-size" data-role="input">
            <input type="text" name="namabelakang" value="" required>              
          </div>
          <label>Jurusan :</label>
          <div class="input-control text full-size" data-role="input">
            <input type="text" name="namabelakang" value="" required>              
          </div>
          <label>Nama dan Alamat Perusahaan :</label>
          <div class="input-control textarea full-size">
            <textarea name="addr"></textarea>
          </div>
          <label>Jabatan :</label>
          <div class="input-control text full-size" data-role="input">
            <input type="text" name="namabelakang" value="" required>              
          </div>
          <label>Email Perusahaan :</label>
          <div class="input-control text full-size" data-role="input">
            <input type="text" name="namabelakang" value="" required>              
          </div>         
        </div>
      </div>
    </div>   

    <div class="cell colspan4">
     <div class="panel danger">
      <div class="heading">
        <span class="title">Rincian Pembayaran</span>
      </div>
      <div class="content" style="padding: 10px 10px 10px 10px;">
        <center><h2>{{ $transaksi->jadwal->nama_lsp }}</h2><br></center>
        <h5>12 Desember 2017 s/d 13 Desember 2017</h5><br>
        <h5>20:00 s/d 23:00 WIB</h5>
        <h5>Rp. 500.000,-</h5>
        <button class="button place-right">Lanjutkan</button><br><br><br>
     </div>
   </div>
 </div>
</div>
</div>
@endsection
