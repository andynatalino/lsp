@extends('layouts.users.app')
@section('pageTitle', 'Home')

@section('content')
<div class="grid">
  <div class="row cells12">
    <div class="cell colspan12">
      <div class="carousel" data-role="carousel" data-height="500" data-effect="fade" data-control-next="<span class='mif-chevron-right'></span>" data-control-prev="<span class='mif-chevron-left'></span>">
        @foreach($slider as $key)
        <div class="slide">
          <div class="image-container image-format-fill" style="width: 100%;height: 100%;">
            <div class="frame">
              <img src="{{ url('assets/slider/'.$key->gambar) }}" data-format="fill" alt="{{ $key->nama_slider }}">
            </div>
          </div>
        </div>
        @endforeach
        @if(sizeof($slider)==0)    
        <span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Slider Kosong!</span>
        @endif
      </div>
      <!-- <img style="width: 100%; height: 500px;" src="{{ url('https://icdn3.digitaltrends.com/image/lenovo-yoga-720-13-inch-22-1500x1000.jpg?ver=1') }}"> -->
      <hr class="thin">

    </div>
  </div>
</div>
<div class="grid">
  <div class="row cells12">
    <div class="cell colspan8">
     @foreach($berita as $key)
     <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
      <div class="heading">
        <span class="title" style="font-size: 80%;"><a style="color: white;" href="{{ url('/berita/'.$key->slug) }}">{{ $key->judul }}</a></span>
      </div>
      <div class="content" style="padding: 10px 10px 10px 10px;">          
       {!! \Illuminate\Support\Str::words($key->isi, 100,'....')  !!}
       <br>
       <br>
       <span class="place-right"><a href="{{ url('/berita/'.$key->slug) }}">Lanjutkan Membaca</a></span><br>
     </div>
   </div><br>
   @endforeach
   @if(sizeof($berita)==0)    
   <span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Berita Kosong!</span>
   @endif

 </div>
 <div class="cell colspan4">
   @if(!Auth::check())   
   <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
    <div class="heading">
      <span class="title" style="font-size: 80%;"><span class="mif-enter"></span> Login</span>
    </div>
    <div class="content" style="padding: 10px 10px 10px 10px;">
      Login atau Register
      <hr class="thin">
      <span class="place-right"><a href="{{ url('login') }}" class="button">Login</a> or <a href="{{ url('register') }}" class="button">Register</a></span>
      <div style="margin-top:30px;">&nbsp;</div>
    </div>
  </div>
  <br>
  @endif  

  <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
  <div class="heading">
    <span class="title" style="font-size: 80%;"><span class="mif-facebook"></span> Facebook</span>
  </div>
  <div class="content" style="margin:0 !important;padding:0 !important;"><center>
    <div data-width="306" class="fb-like-box" data-href="{{ $ss->facebook }}" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="false"></div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=174602582661861&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
  </center>
</div>
</div>
<br>

  <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
    <div class="heading">
      <span class="title" style="font-size: 80%;"><span class="mif-medal"></span> Profesi Paling Diminati
    </span>
  </div>
  <div class="listview set-border padding10" data-role="listview">
    <div class="list">
      <!-- <img src="{{ url('assets/images/2017092714005059cbaf12b54b3.png')}}" class="list-icon"> -->
      <span class="list-title">1. Skema Komputer</span>
    </div>
    <div class="list">
      <!-- <img src="{{ url('assets/images/2017092714005059cbaf12b54b4.png')}}" class="list-icon"> -->
      <span class="list-title">2. Skema Laptop</span>
    </div>
    <div class="list">
      <!-- <img src="{{ url('assets/images/2017092714005059cbaf12b54b5.png')}}" class="list-icon"> -->
      <span class="list-title">3. Skema Mouse</span>
    </div>
  </div>
</div>

</div>
</div>
</div>
<div class="cell colspan4">




</div>

<div class="row cells12">
 <div class="cell colspan8">

 </div>
</div>
{{ $berita->links() }}
@endsection
