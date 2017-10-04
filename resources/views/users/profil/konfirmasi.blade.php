@extends('layouts.users.app')
@section('pageTitle', 'Profil - Konfirmasi')

@section('content')
<h4>Konfirmasi Pembayaran</h4>
Upload bukti transfer anda agar mempercepat proses verifikasi
<div class="grid">
	<div class="row cells12">
		<div class="cell12">
			<table class="table striped hovered border bordered">
				<tr>													
					<td>Pembayaran via</td>
					<td>Atas Nama</td>
					<td>No Rekening</td>
					<td>Lembaga</td>

					<td>Total Biaya</td>
					<td>Opsi</td>
				</tr>	
				@foreach($transaksi as $key)		
				<tr>								
					<td>{{ $key->pembayaran->nama_bank }}</td>
					<td>{{ $key->pembayaran->atas_nama }}</td>
					<td>{{ $key->pembayaran->no_rek }}</td>
					<td>{{ $key->jadwal->nama_lsp }}</td>  
					
					<td>Rp. {{ $key->jadwal->biaya }},-</td>
					<td>
						<form method="post" action="{{url('profil/konfirmasi')}}" enctype="multipart/form-data">
							<div class="input-control file full-size" data-role="input">
								<input type="file" required class="form-control" enctype="multipart/form-data" name="photo_bukti">
								<button class="button"><span class="mif-folder"></span></button>
							</div>
							<input type="hidden" name="id" value="{{ $key->id }}">
							{{ csrf_field()}}
							<button type="submit" class="button">Upload Bukti</button>
						</form>
					</td>
				</tr>
				@endforeach		
			</table>
		</div>
	</div>
</div>
<h5>N.b. Foto bukti transfer Anda dengan jelas untuk mempercepat proses verifikasi</h5>
@endsection