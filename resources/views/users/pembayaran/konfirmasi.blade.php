@extends('layouts.users.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')
<h1>Pembayaran via : {{ $transaksi->pembayaran->nama_bank }}</h1>
<h2>No Rekening : {{ $bank->no_rek }}</h2>
<h2>Atas Nama : {{ $bank->atas_nama }}</h2>

<a href="{{ url('profil/konfirmasi') }}"><button class="button">Konfirmasi Pembayaran</button></a>

@endsection
