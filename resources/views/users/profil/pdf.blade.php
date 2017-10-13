<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>
	<style type="text/css">

</style>
</head>
<body>
	<table style="width: 100%; border: 1px solid black;">

		<thead>
			<td>
				<div id="header">
					<img style="width: 50px; height: 50px;" src="{{ url('assets/logo.png')}}">Bukti Pendaftaran dan Bukti Transaksi
				</div>
				<hr>
			</td>
		</thead>
		<tr>
			<th>

				No Registrasi : {{ $transaksi->id }}<br>
				Nama	: {{ $transaksi->user->name }}<br>
				Tipe Pembayaran : {{ $transaksi->pembayaran->nama_bank }}<br>
				Tanggal Konfirmasi : {{ date('j F Y', strtotime($transaksi->tanggal_konfirmasi)) }}<br>
				Tanggal Transaksi : {{ date('j F Y', strtotime($transaksi->tanggal_transaksi)) }}<br>


			</th>
		</tr>	
	</table>
</body>
</html>
