@extends('layouts.users.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')
<h3>Pelatihan yang Anda Pilih</h3>
@if(sizeof($transaksi)==0)    
<span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Kosong!</span>
@endif
@foreach($transaksi as $key)
<h5> ID User : {{ $key->id_user }} </h5>
<h5> ID Jadwal : {{ $key->jadwal->nama_lsp }} </h5>

<form action="{{ url('pembayaran') }}" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="id" value="{{ $key->id }}">
  
<button class="button">Lanjut ke pembayaran</button>
</form>
<form action="{{ url('pembayaran/'.$key->id) }}" method="post">               
  <button class="button">Hapus</button>
  <input type="hidden" name="_method" value="DELETE">
  {{ csrf_field() }}
</form>
<hr>  
@endforeach
<h6>N.b Pilih salah satu pelatihan dan klik lanjut ke pembayaran</h6>


@endsection
