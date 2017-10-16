<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>PDF</title>
	<style type="text/css">
	div#header {
		background-color: rgba(0,0,0, 0.1);
		padding: 10px;
	}
	.jumbotron {
		border-radius: 0px;
	}
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">		
		<div class="panel panel-default">			
			<div class="panel-heading"><img style="width: 50px; height: 50px;" src="{{ url('assets/logo/logo.ico')}}">&nbsp;<b>Bukti Pendaftaran dan Bukti Transaksi</b></div>
			<div class="panel-body jumbotron">
				<h1>Bukti Pendaftaran</h1>
			</div>
			
			<table class="table">
				<tbody>			
					<tr>
						<td>No Registrasi</td>			
						<td>: {{ $transaksi->id }}</td>				
					</tr>
					<tr>
						<td>Nama</td>
						<td>: {{ $transaksi->user->name }}</td>			
					</tr>
					<tr>
						<td>Tipe Pembayaran</td>
						<td>: {{ $transaksi->pembayaran->nama_bank }}</td>			
					</tr>
					<tr>
						<td>Tanggal Konfirmasi</td>
						<td>: {{ date('j F Y', strtotime($transaksi->tanggal_konfirmasi)) }}</td>
					</tr>
					<tr>
						<td>Tanggal Transaksi</td>
						<td>: {{ date('j F Y', strtotime($transaksi->tanggal_transaksi)) }}</td>
					</tr>	
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
