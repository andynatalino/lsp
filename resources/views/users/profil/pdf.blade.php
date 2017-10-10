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
					<img style="width: 50px; height: 50px;" src="{{ url('assets/logo.png')}}">Bukti Pendaftaran
				</div>
				<hr>
			</td>
		</thead>
		<tr>
			<th>

				{{ $transaksi->id }}<br>
				{{ $transaksi->id_user }}<br>
				{{ $transaksi->id_pembayaran }}<br>
				{{ $transaksi->konfirmasi }}<br>
				{{ $transaksi->tanggal_transaksi }}<br>
				{{ $transaksi->status }}<br>

			</th>
		</tr>	
	</table>
</body>
</html>
