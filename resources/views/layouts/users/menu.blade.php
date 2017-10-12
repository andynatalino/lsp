<?php
  $s = App\Setting::first();  
?>
<div class="app-bar fixed {{ $s->color_web }}" data-role="appbar">
  <div class="container">
    <a class="app-bar-element branding" href="{{ url('/') }}"> 
      <img src="{{ url('assets/images/'.$s->logo) }}" style="height: 38px; display: inline-block; margin-right: 10px;">{{ $s->nama_web }}</a>
    <ul class="app-bar-menu">
      <li><a href="{{ url('sertifikasi') }}">Sertifikasi</a></li>
      <li><a href="{{ url('berita') }}">Berita</a></li>
      <li><a href="">Kontak</a></li>
      <li><a href="">Galeri</a></li>
      <li><a href="{{ url('tentang') }}">Tentang</a></li>
      <li>
        <a href="" class="dropdown-toggle">More</a>
        <ul class="d-menu" data-role="dropdown">
          <li><a href="{{ url('login') }}">Login</a></li>
          <li><a href="{{ url('register') }}">Register</a></li>
          <li><a href="">Outlook</a></li>
          <li><a href="">Office 2015</a></li>
          <li class="divider"></li>
          <li><a href="" class="dropdown-toggle">Other Products</a>
            <ul class="d-menu" data-role="dropdown">
              <li><a href="">Internet Explorer 10</a></li>
              <li><a href="">Skype</a></li>
              <li><a href="">Surface</a></li>
            </ul>
          </li>
        </ul>

      </li>
    </ul>

    @if(Auth::check())
    <div class="app-bar-element place-right">
      <a class="dropdown-toggle fg-white"><span class="mif-user"></span> {{ Auth::user()->name }}</a>
      <ul class="d-menu" data-role="dropdown">
        <li><a href="{{ url('profil')}}"><span class="mif-user"></span> Profil</a></li>             
        <li><a href="{{ url('pembayaran')}}"><span class="mif-money"></span> Pembayaran</a></li>
        <li><a href="{{ url('profil/konfirmasi')}}"><span class="mif-user-check"></span> Konfirmasi</a></li>
        <li><a href="{{ url('profil/transaksisaya')}}"><span class="mif-list"></span> Transaksi Saya</a></li>
        <li><a href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="mif-exit"></span> Logout</a></li>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </div>
    </ul>
  </div>
  @endif
  
</div>
</div>
