@extends('layouts.users.app')
@section('pageTitle', 'Checkout - Konfirmasi')

@section('content')
<div class="grid">
	<div class="row cells12">
		<div class="cell12">			
			Pendaftaran Skema {{ $transaksi->jadwal->nama_lsp }} mohon mentransfer sesuai nominal dibawah ini untuk mempercepat proses konfirmasi<br><br>
			
			<div class="content" style="padding: 10px 10px 10px 10px; background-color: #FAFAFA;">						
				<center>
					<h1>{{ $transaksi->pembayaran->nama_bank }}</h1><br>
					No. Rekening<br>
					<h3>{{ $bank->no_rek }}</h3><br>
					Atas Nama<br>
					<h4>{{ $bank->atas_nama }}</h4><br>
					Total<br>
					<h3>Rp. {{ $transaksi->jadwal->biaya }},-</h3><br>
					<a href="{{ url('profil/konfirmasi') }}"><button class="button"><span class="mif-money"></span> Konfirmasi / Upload Bukti</button></a>					
				</center>		
			</div>
		</div>
	</div>
</div>
@endsection
