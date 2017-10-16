@extends('layouts.users.app')
@section('pageTitle', 'Tentang')

@section('content')
  <h1>Tentang Perusahaan</h1>

  {!! $tentang->tentang !!}
@endsection
