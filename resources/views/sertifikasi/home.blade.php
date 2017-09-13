@extends('layouts.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')
<div class="grid">
  <div class="row cells3">
    <?php $i=1;?>
    @foreach($kategori as $key)
    <div class="cell">
      <div class="panel alert">
        <div class="heading">
          <span class="title"><a href="{{ url('sertifikasi/'.$key->slug) }}" style="color:white; padding: 10px 10px 10px 10px;" onclick="document.getElementById('my_form').submit(); return false;">{{ $key->nama_sp }}</a></span>
        </div>
        <div class="content padding10">
          <div class="panel image-container">
            <div class="frame"><img src="{{ url('assets/kategori/'.$key->image) }}"></div>
          </div>
          {{ $key->isi }}
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
        {{ $kategori->links() }}
      </div>
  </div>
  </div>
</div>
@endsection
