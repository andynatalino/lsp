@extends('layouts.users.app')
@section('pageTitle', 'Home')

@section('content')
<a href="{{ url('/sertifikasi/lsp-mouse'.-time()) }}">asdas</a>
<div class="grid">
  <div class="row cells12">
    <div class="cell colspan8">
<!--       <div class="carousel" data-role="carousel" data-height="500"  data-control-next="<span class='mif-chevron-right'></span>" data-control-prev="<span class='mif-chevron-left'></span>">
        @foreach($slider as $key)
        <div class="slide"><img src="{{ url('assets/slider/'.$key->gambar) }}" data-role="fitImage" data-format="fill" alt="{{ $key->nama_slider }}"></div>
        @endforeach
        @if(sizeof($slider)==0)    
        <span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Slider Kosong!</span>
        @endif
      </div> -->
      <img style="width: 100%; height: 500px;" src="{{ url('https://icdn3.digitaltrends.com/image/lenovo-yoga-720-13-inch-22-1500x1000.jpg?ver=1') }}">
      <hr class="thin">
      @foreach($berita as $key)
      <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
        <div class="heading">
          <span class="title">{{ $key->judul }}</span>
        </div>
        <div class="content" style="padding: 10px 10px 10px 10px;">
          {!! str_limit($key->isi, 500) !!}
          <br>
          <br>
          <span class="place-right">Lanjutkan Membaca</span><br>
        </div>
      </div><br>
      @endforeach
      @if(sizeof($berita)==0)    
      <span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Berita Kosong!</span>
      @endif
    </div>
    <div class="cell colspan4">
      <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
        <div class="heading">
          <span class="title"><span class="mif-medal"></span> LSP Paling Diminati
        </span>
      </div>
      <div class="listview set-border padding10" data-role="listview">
        <div class="list">
          <!-- <img src="{{ url('assets/images/2017092714005059cbaf12b54b3.png')}}" class="list-icon"> -->
          <span class="list-title">1. LSP Komputer</span>
        </div>
        <div class="list">
          <!-- <img src="{{ url('assets/images/2017092714005059cbaf12b54b4.png')}}" class="list-icon"> -->
          <span class="list-title">2. LSP Laptop</span>
        </div>
        <div class="list">
          <!-- <img src="{{ url('assets/images/2017092714005059cbaf12b54b5.png')}}" class="list-icon"> -->
          <span class="list-title">3. LSP Mouse</span>
        </div>
      </div>
    </div>

    @if(!Auth::check())
    <br>
    <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
      <div class="heading">
        <span class="title"><span class="mif-enter"></span> Login</span>
      </div>
      <div class="content" style="padding: 10px 10px 10px 10px;">
        Login atau Register
        <hr class="thin">
        <span class="place-right"><a href="{{ url('login') }}" class="button">Login</a> or <a href="{{ url('register') }}" class="button">Register</a></span>
        <div style="margin-top:30px;">&nbsp;</div>
      </div>
    </div>
    @endif  
    <br>
    <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
      <div class="heading">
        <span class="title"><span class="mif-facebook"></span> Facebook</span>
      </div>
      <div class="content" style="margin:0 !important;padding:0 !important;"><center>
        <div class="fb-page" data-width="306" data-href="https://www.facebook.com/WOLES-447614195299983/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/WOLES-447614195299983/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/WOLES-447614195299983/">WOLES</a></blockquote></div>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=174602582661861";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
      </center>
    </div>
  </div>
</div>


</div>
<div class="row cells12">
 <div class="cell colspan8">

 </div>
</div>
</div>
{{ $berita->links() }}
@endsection
