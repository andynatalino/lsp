@extends('layouts.app-operator')
@section('title')
Buat Berita &raquo Operator
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
        <h1 class="text-light">Buat Berita</h1>
        <hr class="thin bg-grayLighter">
        <!-- <button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span> Create...</button>
        <button class="button success" onclick="pushMessage('success')"><span class="mif-play"></span> Start</button>
        <button class="button warning" onclick="pushMessage('warning')"><span class="mif-loop2"></span> Restart</button>
        <button class="button alert" onclick="pushMessage('alert')">Stop all machines</button>
        <hr class="thin bg-grayLighter"> -->

        <form action="{{url('operator/berita')}}" method="post">
          <table>
            <tbody>
              <tr>
                <td>Judul Berita :</td>
              </tr>
              <tr>
                <td width="30px">
                  <div class="input-control text full-size">
                    <input type="text" name="judul" required>
                    {{csrf_field()}}
                  </div>
                </td>
              </tr>
              <tr>
                <td>Isi Berita :</td>
              </tr>
              <tr>
                <td width="30px">
                  <div class="input-control textarea">
                    <textarea name="isi" style="width: 1000px;"></textarea>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <button class="button primary button">Buat Berita</button>
                </td>
              </tr>
            </tbody>
          </table>
        </form>


      </div>
    </div>
  </div>
</div>
@endsection
