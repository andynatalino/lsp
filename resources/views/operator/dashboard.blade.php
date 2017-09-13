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
          <li class="active"><a href="{{ url('operator') }}">
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
            <span class="title">Jadwal Sertifikasi</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="{{ url('operator/kategori') }}">
            <span class="mif-equalizer icon"></span>
            <span class="title">Kategori LSP</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="{{ url('operator/transaksi') }}">
            <span class="mif-money icon"></span>
            <span class="title">TRANSAKSI</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="{{ url('operator/konfirmasi') }}">
            <span class="mif-user-check icon"></span>
            <span class="title">KONFIRMASI</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="{{ url('operator/jadwal') }}">
            <span class="mif-vpn-publ icon"></span>
            <span class="title">Wilayah</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="{{ url('operator/jadwal') }}">
            <span class="mif-credit-card icon"></span>
            <span class="title">Tipe Pembayaran</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="{{ url('operator/slider') }}">
            <span class="mif-display icon"></span>
            <span class="title">SLIDER</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="{{ url('operator/slider') }}">
            <span class="mif-file-pdf icon"></span>
            <span class="title">Laporan</span>
            <span class="counter">0</span>
          </a></li>
        </ul>
      </div>

      <div class="cell auto-size padding20 bg-white" id="cell-content">
        <h1 class="text-light">Dashboard</h1>
        <hr>

      </div>

      @endsection
