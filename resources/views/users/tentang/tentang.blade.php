@extends('layouts.users.app')
@section('pageTitle', 'Tentang')

@section('content')
<?php $i=1; $j=1; $k=1; $l=1; $c=2;?>
<!-- <style type="text/css">
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
</script> -->
<style type="text/css">
div.panell { display:none; }
div.panell.active { display:block; }
</style>

<div class="grid">
	<div class="row cells12">
		<div class="cell colspan8 offset2">      
			<div class="cell">
				@foreach($tentang as $key)				
				<a href='#' class='link'>
					<div class="panel collapsed" data-role="panel">
						<div class="heading" style="border-top-left-radius: 0%;border-top-right-radius: 0%;">
							<center><span class="title">{{ $key->judul }}</span></center>
						</div>
					</div>
				</a>
				<div id='#div1' class='panell'>
					<div class="panel">						
						<div class="content" style="padding: 10px 10px 10px 10px;">
							<h5>{!! $key->tentang !!}</h5>
						</div>
						<br>
					</div>
				</div>				
				@endforeach
			</div>
		</div>

		<div class="cell colspan8">
			@foreach($tentang as $key)
			
			@endforeach
		</div>

	</div>
</div>
<script type="text/javascript">
	$(function()   {
		$(".link").click(function(e) {
			e.preventDefault();
			$('div.panell:visible').hide();
			$(this).next('div.panell').show();
		});
	});
</script>
@endsection
