@extends('layouts.users.app')
@section('pageTitle', 'Tentang')

@section('content')
<?php $i=1; $j=1; $k=1; $l=1; $c=2;?>
<style type="text/css">
@foreach($tentang as $key)
#panel{{$c++}}{
	display: none;
}
@endforeach
</style>
<div class="grid">
	<div class="row cells12">
		<div class="cell colspan4">      
			<div class="cell">
				@foreach($tentang as $key)
				<div class="panel  collapsed" id='hideshow{{$i++}}' data-role="panel">
					<div class="heading">
						<span class="title">{{ $key->judul }}</span>
					</div>
				</div><br>
				@endforeach
			</div>
		</div>   

		<div class="cell colspan8">
			@foreach($tentang as $key)
			<div class="panel" id="panel{{$j++}}">
				<div class="heading">
					<span class="title">{{ $key->judul }}</span>
				</div>
				<div class="content" style="padding: 10px 10px 10px 10px;">
					<h5>{!! $key->tentang !!}</h5>

				</div>
				<br>
			</div>
			@endforeach
		</div>
	</div>
</div>
<script type="text/javascript">
	@foreach($tentang as $key)
	$(document).ready(function(){
		$("#hideshow{{$k++}}").click(function(){
			$("#panel{{$l++}}").toggle();	
			$("#hideshow1").panel();
		});
	});
	@endforeach
</script>
@endsection
