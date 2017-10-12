@extends('layouts.users.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')
<div class="grid">
  <div class="row cells3">
    <?php $i=1;?>
    @foreach($berita as $key)
    <div class="cell">
      <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
        <div class="heading">
          <span class="title"><a href="{{ url('berita/'.$key->slug) }}" style="color:white; padding: 10px 10px 10px 10px;" onclick="document.getElementById('my_form').submit(); return false;">{{ $key->judul }}</a></span>
        </div>
        <div class="content padding10">
          <div class="panel image-container">
            <div class="frame"><img src="{{ url('assets/kategori/'.$key->image) }}"></div>
          </div>
          {!! $key->isi !!}
        </div>
        <hr>
      </div>
    </div>
    @if($i%3==0)
  </div>
  <div class="row cells3">
    @endif
    <?php $i++;?>
    @endforeach
    <div class="row cells1">
      <div class="cell">
        {{ $berita->links() }}
      </div>
  </div>
  </div>
</div>
    @if(sizeof($berita)==0)    
    <span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Kosong!</span>
    @endif
@endsection
