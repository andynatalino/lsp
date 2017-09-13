@extends('layouts.app-operator')
@section('title')
Berita &raquo Operator
@endsection

@section('content')
<div class="page-content">
  <div class="flex-grid no-responsive-future" style="height: 100%;">
    <div class="row" style="height: 100%">
      <div class="cell size-x200" id="cell-sidebar" style="background-color: #0072c6; height: 100%">
        <ul class="sidebar navy" style="background-color: #0072c6;">
          <li><a href="{{ url('operator') }}">
            <span class="mif-apps icon"></span>
            <span class="title">dashboard</span>
            <span class="counter">123</span>
          </a></li>
          <li><a href="{{ url('operator/users') }}">
            <span class="mif-users icon"></span>
            <span class="title">Users</span>
            <span class="counter">0</span>
          </a></li>
          <li class="active"><a href="{{ url('operator/berita') }}">
            <span class="mif-books icon"></span>
            <span class="title">Berita</span>
            <span class="counter">2</span>
          </a></li>
          <li><a href="{{ url('operator/sertifikasi') }}">
            <span class="mif-profile icon"></span>
            <span class="title">Sertifikasi</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="{{ url('operator/transaksi') }}">
            <span class="mif-money icon"></span>
            <span class="title">TRANSAKSI</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="{{ url('operator/konfirmasi') }}">
            <span class="mif-cogs icon"></span>
            <span class="title">KONFIRMASI</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="{{ url('operator/jadwal') }}">
            <span class="mif-calendar icon"></span>
            <span class="title">JADWAL</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="{{ url('operator/slider') }}">
            <span class="mif-display icon"></span>
            <span class="title">SLIDER</span>
            <span class="counter">0</span>
          </a></li>
        </ul>
      </div>

        <div class="cell auto-size padding20 bg-white" id="cell-content">
          <h1 class="text-light">Berita<a href="{{url('operator/berita/buat')}}"><span class="place-right"><button class="button primary button">Buat Berita</button></span></a></h1>
          <hr class="thin bg-grayLighter">
          <!-- <button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span> Create...</button>
          <button class="button success" onclick="pushMessage('success')"><span class="mif-play"></span> Start</button>
          <button class="button warning" onclick="pushMessage('warning')"><span class="mif-loop2"></span> Restart</button>
          <button class="button alert" onclick="pushMessage('alert')">Stop all machines</button>
          <hr class="thin bg-grayLighter"> -->
          <table class="dataTable border bordered" data-role="datatable" data-auto-width="false">
            <thead>
              <tr>
                <td style="width: 20px">
                </td>
                <td class="sortable-column sort-asc" style="width: 20px">Judul</td>
                <td class="sortable-column" style="width: 20px">Isi</td>
                <td class="sortable-column" style="width: 20px">Penulis</td>
                <td class="sortable-column" style="width: 20px">Di Buat</td>
                <td class="sortable-column" style="width: 20px">Di Perbarui</td>
                <td style="width: 20px">Action</td>
              </tr>
            </thead>
            <?php
            $i = 1;
            ?>
            <tbody>
              @foreach($berita as $key)
              <tr>
                <td>
                  <label class="input-control checkbox small-check no-margin">
                    <input type="checkbox">
                    <span>{{$i++}}</span>
                  </label>
                </td>
                <td>{{ $key->judul }}</td>
                <td>{{ $key->isi }}</td>
                <td>{{ $key->id_user }}</td>
                  <td>{{ $key->created_at }}</td>
                <td class="align-center">{{ $key->updated_at }}</td>
                <td>
                  <!-- <a href="#"><button class="button success small-button">Lihat</button></a>
                  <button class="button primary small-button">Edit</button>
                  <button class="button danger small-button">Hapus</button> -->
                  <center>
                  <div class="dropdown-button">
                    <button class="button dropdown-toggle">Opsi</button>
                    <ul class="split-content d-menu" data-role="dropdown">
                      <li><a href="#">Lihat</a></li>
                      <li><a href="#">Edit</a></li>
                      <li><a href="#">Hapus</a></li>
                    </ul>
                  </div>
                </center>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
