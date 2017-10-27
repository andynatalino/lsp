@extends('layouts.users.app')
@section('pageTitle', 'Sertifikasi')

@section('content')
<ul class="breadcrumbs">
	<li><a href="{{ url('/') }}"><span class="icon mif-home"></span></a></li>
	<li><a href="{{ url('/berita') }}">Berita</a></li>
	<li><a href="{{ url('/berita/'.$berita->slug) }}">{{ $berita->judul }}</a></li>
</ul>
<div class="grid">
	<div class="row">
		<div class="cell">
			<h1>{{ $berita->judul }}</h1>
			{!! $berita->isi !!}
		</div>
	</div>
</div>


@endsection
