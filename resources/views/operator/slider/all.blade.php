@extends('layouts.app-operator')
@section('title')
Dashboard &raquo Operator
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
          <li><a href="{{ url('operator/berita') }}">
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
          <li class="active"><a href="{{ url('operator/slider') }}">
            <span class="mif-display icon"></span>
            <span class="title">SLIDER</span>
            <span class="counter">0</span>
          </a></li>
        </ul>
      </div>

      <div class="cell auto-size padding20 bg-white" id="cell-content">
        <h1 class="text-light">Slider<a href="{{url('operator/slider/buat')}}"><span class="place-right"><button class="button primary button">Tambah Slider</button></span></a></h1>
        <hr class="thin bg-grayLighter">
        <table width="100%" class="table striped hovered cell-hovered border bordered">
          <?php
          $i = 1;
          ?>
          <tbody>
            <tr>
              <td>No</td>
              <td>Nama Slider</td>
              <td>Gambar</td>
              <td>Opsi</td>
            </tr>
            @foreach($slider as $key)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $key->nama_slider }}</td>
              <td> <center>
                <img style="width:100px; height:100px;" src="{{ url('assets/slider/'.$key->gambar) }}">
              </center>
            </td>
            <td>
               <center>
                 <button class="button success small-button">Edit</button> <button class="button danger small-button">Hapus</button>
                </center>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>

    @endsection
