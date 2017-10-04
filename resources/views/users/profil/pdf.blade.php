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
				@foreach($transaksi as $key)
				{{ $key->id }}<br>
				{{ $key->id_user }}<br>
				{{ $key->id_pembayaran }}<br>
				{{ $key->konfirmasi }}<br>
				{{ $key->tanggal_transaksi }}<br>
				{{ $key->status }}<br>
				@endforeach
			</th>
		</tr>	
	</table>
</body>
</html>
