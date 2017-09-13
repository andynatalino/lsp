<div class="app-bar fixed top red" data-role="appbar">
  <div class="container">
    <a class="app-bar-element branding" href="{{ url('/') }}"> <img src="{{ url('assets/logo.png') }}" style="height: 38px; display: inline-block; margin-right: 10px;">LSP</a>
    <ul class="app-bar-menu">
      <li><a href="{{ url('sertifikasi') }}">Sertifikasi</a></li>
      <li><a href="{{ url('profil') }}">Profil</a></li>
      <li><a href="">Kontak</a></li>
        <li><a href="">Galeri</a></li>
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
  </div>
</div>
