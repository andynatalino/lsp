@extends('layouts.users.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')
Konfirmasi Pembayaran<br>
Upload bukti transfer anda agar mempercepat proses verifikasi<br>
@foreach($transaksi as $key)
id user : {{ $key->id_user }}<br>
id pembayaran : {{ $key->id_pembayaran }}<br>
nama lsp : {{ $key->jadwal->nama_lsp }}<br>
tanggal mulai : {{ $key->jadwal->tanggal_mulai }}<br>
tanggal selesai : {{ $key->jadwal->tanggal_selesai }}<br>
biaya : {{ $key->jadwal->biaya }}<br>
<form method="post" action="{{url('profil/konfirmasi')}}" enctype="multipart/form-data">
	<input type="file" name="photo_bukti"><br>
	<input type="hidden" name="id" value="{{ $key->id }}">
	{{ csrf_field()}}
<button type="submit" class="button">Upload Bukti</button>

</form>
<hr>
@endforeach
@endsection