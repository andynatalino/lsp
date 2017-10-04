@extends('layouts.users.app')
@section('pageTitle', 'Profil - Transaksi Saya')

@section('content')
<h4>Transaksi Saya</h4>
<div class="grid">
  <div class="row cells12">
    <div class="cell12">
      <table class="table striped hovered border bordered">
        <thead>
          <tr>                
            <th>Lembaga</th>
            <th>Pembayaran</th> 
            <th>No Rekening</th>
            <th>Atas Nama</th>
            <th>Total Biaya</th>
            <th>Tanggal Konfirmasi</th>
            <th>Opsi</th>
          </tr>     
        </thead>
        @foreach($transaksi as $key)
        <tr>             
          @if($key->status == 5)     
          <td>{{ $key->jadwal->nama_lsp }}</td>
          <td>{{ $key->pembayaran->nama_bank }}</td>  
          <td>{{ $key->pembayaran->no_rek }}</td>
          <td>{{ $key->pembayaran->atas_nama }}</td>
          <td>Rp. {{ $key->jadwal->biaya }},-</td>
          <td>{{ date('j F Y', strtotime($key->tanggal_konfirmasi)) }}</td>
          <td>
            <button type="submit" class="button"><span class="mif-file-pdf"></span> Cetak Bukti</button>
          </td>
          @elseif($key->status == 4)
          <td>{{ $key->jadwal->nama_lsp }}</td>
          <td>{{ $key->pembayaran->nama_bank }}</td>  
          <td>{{ $key->pembayaran->no_rek }}</td>
          <td>{{ $key->pembayaran->atas_nama }}</td>
          <td>Rp. {{ $key->jadwal->biaya }},-</td>
          <td>{{ date('j F Y', strtotime($key->tanggal_konfirmasi)) }}</td>
          <td>Menunggu Verifikasi</td>
          @endif
        </tr>
        @endforeach   
      </table>
    </div>
  </div>
</div>
<h5>N.b. Jika 1x24 Jam Transaksi Anda tidak di proses hubungi kontak<a href=""> disini</a></h5>
@endsection
