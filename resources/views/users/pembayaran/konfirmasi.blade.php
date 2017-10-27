@extends('layouts.users.app')
@section('pageTitle', 'Checkout - Konfirmasi')

@section('content')
<h4>Segera melakukan pembayaran ke bank yang tertera dibawah ini :</h4>
<div class="grid">
	<div class="row cells12">
		<div class="cell12">
			<table class="table striped hovered border bordered">
				<tr>								
					<td>Pembayaran via</td>	
					<td>Skema</td>
					<td>No Rekening</td>
					<td>Atas Nama</td>
					<td>Total Biaya</td>
					<td>Opsi</td>
				</tr>			
				<tr>								
					<td>{{ $transaksi->pembayaran->nama_bank }}</td>	
					<td>{{ $transaksi->jadwal->nama_lsp }}</td>
					<td>{{ $bank->no_rek }}</td>
					<td>{{ $bank->atas_nama }}</td>
					<td>Rp. {{ $transaksi->jadwal->biaya }},-</td>
					<td>
						<a href="{{ url('profil/konfirmasi') }}"><button class="button"><span class="mif-money"></span> Konfirmasi</button></a>
					</td>
				</tr>		
			</table>
		</div>
	</div>
</div>
<h5>N.b. Setelah melakukan pembayaran Anda dimohon mengupload bukti transfer untuk mempercepat proses verifikasi.</h5>
@endsection
