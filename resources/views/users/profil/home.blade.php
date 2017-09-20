@extends('layouts.users.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')
<div class="grid">
	<div class="row cells12">
		<div class="cell colspan4">

				<div class="panel">
				<div class="heading">
					<span class="icon">
						<span class="mif-info mif-ani-heartbeat"></span>
					</span>
					<div class="title">About  

						me 

					</div>
				</div>
				<div class="content">
					<h2>andro meda</h2>
					He  was born at Surabaya, 0 years ago and
					join with IT Club since 06 Mar 2017.
					andro also known as andromeda.                          andro is Married now ^_^ 
					<hr>
					<span class="button" onclick="update()">Update Profile</span>
				</div>

			</div>

			<hr>

			<div class="image-container bordered image-format-hd">
				<div class="frame">
					<img src="http://it-club.smkn10jakarta.sch.id/images/foto/2017091712364159be09e9c8c28.jpg">
				</div>
			</div>
		</div>
		<div class="cell colspan8">
			<div class="row cells8">
				<div class="panel">
					<div class="heading">
						<span class="icon">
							<span class="mif-bubble mif-ani-pass"></span>
						</span>
						<span class="title">Info Kontak</span>
					</div>
					<div class="content">
						<div class="input-control textarea full-size">
							<textarea    id="info" name="info"></textarea>
						</div>
						<a onclick="update_status()" class="button place-right">Update</a>
						<div>&nbsp;</div>
						<div>&nbsp;</div>
					</div>
				</div>
			</div>
			<span class="place-right"></span>
		</div>
	</div>
</div>

</div>
</div>
</div>@endsection
