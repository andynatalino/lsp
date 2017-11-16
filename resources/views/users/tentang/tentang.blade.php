@extends('layouts.users.app')
@section('pageTitle', 'Tentang')

@section('content')
<div class="grid">
	<div class="row">
		<div class="cell">
			<h1>{{ $tentang->judul }}</h1>
			{!! $tentang->tentang !!}
		</div>
	</div>
</div>
@endsection
