@extends('layouts.users.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')
<ul class="breadcrumbs">
    <li><a href="{{ url('/') }}"><span class="icon mif-home"></span></a></li>
    <li><a href="{{ url('/sertifikasi') }}">Sertifikasi</a></li>
    <li><a href="#">{{ $kategori->nama_sp }}</a></li>
</ul>
<table id="jadwal" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Lembaga</th>
            <th>Tanggal Mulai - Tanggal Selesai</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Kuota</th>
            <th>Biaya</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>                
        </tr>
    </tfoot>
    <tbody>
      @foreach($jadwal as $key)
      <tr>
         <td><a href="{{ url('sertifikasi/'.$kategori->slug.'/'.$key->slug) }}">{{ $key->nama_lsp }}</a></td>
         <td>{{ $key->tanggal_mulai }} - {{ $key->tanggal_selesai }}</td>
         <td>{{ $key->waktu }}</td>
         <td>{{ str_limit($key->lokasi, 20) }}</td>
         <td>{{ App\Transaksi::where(['id_jadwal' => $key->id, 'status' => 5])->get()->count() }} / {{ $key->kuota }} Orang</td>
         <td>Rp. {{ $key->biaya }},-</td >
     </tr>
     @endforeach
 </tbody>
</table>
@if(sizeof($jadwal)==0)    
<span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Kosong!</span>
@endif
<script type="text/javascript">
  $(document).ready(function() {
    $('#jadwal').DataTable();
</script>
@endsection
