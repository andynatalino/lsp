@extends('layouts.users.app')
@section('pageTitle', 'Profil - Transaksi Saya')

@section('content')
<style type="text/css">
.pagination{
  float: right;
}
</style>
<h4>Transaksi Saya</h4>
<div class="grid">
  <div class="row cells12">
    <div class="cell12">
      <table class="table striped hovered border bordered">
        <thead>
          <tr>                
            <th>Skema</th>
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
           <a target="_blank" href="{{ url('profil/'.$key->id.'/pdf')}}"><button type="submit" class="button"><span class="mif-file-pdf"></span> Cetak Bukti</button></a>
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
   {{$transaksi->links()}}
 </div>
</div>
<h5>N.b. Jika 1x24 Jam Transaksi Anda tidak di proses hubungi kontak<a href="{{ url('kontak')}}"> disini</a></h5>
@if(session('sukses'))
<script type="text/javascript">
  $(function(){
    setTimeout(function(){
      $.Notify({type: 'success', icon: "<span class='mif-checkmark mif-ani-bounce mif-ani-slow'></span>", keepOpen: true, caption: 'Berhasil', content: "{{ session('sukses')}}"});
    }, 0);
  });
</script>
@endif
@endsection
