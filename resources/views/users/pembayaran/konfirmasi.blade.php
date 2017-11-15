@extends('layouts.users.app')
@section('pageTitle', 'Checkout - Konfirmasi')

@section('content')
<?php $aa = App\Setting::get(); ?>
<div class="grid">
	<div class="row cells12">
		<div class="cell12">						
		<div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
				<div class="heading">				
					<div class="title">Rincian Pembayaran</div>
				</div>
				<div class="content" style="padding: 10px 10px 10px 10px; background-color: #FAFAFA;">						
					<center>
						<h1>{{ $transaksi->pembayaran->nama_bank }}</h1><br>
						No. Rekening<br>
						<h3>{{ $bank->no_rek }}</h3><br>
						Atas Nama<br>
						<h4>{{ $bank->atas_nama }}</h4><br>
						Total<br>
						<h3>Rp. {{ $transaksi->kodepembayaran }},-</h3><br>
						<a href="{{ url('profil/konfirmasi') }}"><button class="button"><span class="mif-money"></span> Konfirmasi / Upload Bukti</button></a>					
					</center>		
				</div>
				N.b. Pendaftaran Skema {{ $transaksi->jadwal->nama_lsp }} mohon mentransfer sesuai nominal untuk mempercepat proses konfirmasi<br><br>
			</div>
		</div>
	</div>
</div>
@endsection
