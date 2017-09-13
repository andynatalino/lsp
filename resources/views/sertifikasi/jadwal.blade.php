@extends('layouts.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')
<table class="dataTable border bordered" data-role="datatable" data-auto-width="false">
  <thead>
    <tr>
      <td style="width: 20px">
      </td>
      <td class="sortable-column sort-asc" style="width: 10px">Lembaga</td>
      <td class="sortable-column" style="width: 10px">Tanggal Mulai</td>
      <td class="sortable-column" style="width: 10px">Tanggal Selesai</td>
      <td class="sortable-column" style="width: 10px">Waktu</td>
      <td class="sortable-column" style="width: 10px">Lokasi</td>
      <td class="sortable-column" style="width: 10px">Kuota</td>
      <td class="sortable-column" style="width: 10px">Status</td>
      <td style="width: 10px">Action</td>
    </tr>
  </thead>
  <?php
  $i = 1;
  ?>
  <tbody>
    @foreach($jadwal as $key)
    <tr>
      <td>
        <label class="input-control checkbox small-check no-margin">
          <input type="checkbox">
          <span>{{$i++}}</span>
        </label>
      </td>
      <td><a href="{{ url('sertifikasi/'.$kategori->slug.'/'.$key->slug) }}">{{ $key->nama_lsp }}</a></td>
      <td>{{ $key->tanggal_mulai }}</td>
      <td>{{ $key->tanggal_selesai }}</td>
      <td>{{ $key->waktu }}</td>
      <td>{{ $key->lokasi }}</td>
      <td>{{ $key->kuota }}</td>
      <td class="align-center">{{ $key->status }}</td>
      <td>
        <!-- <a href="{{url('admin/user/'.$key->number)}}"><button class="button success small-button">Lihat</button></a>
        <button class="button primary small-button">Edit</button>
        <button class="button danger small-button">Hapus</button> -->
        <center>
        <div class="dropdown-button">
          <button class="button">Lihat</button>
        </div>
      </center>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  @endsection
