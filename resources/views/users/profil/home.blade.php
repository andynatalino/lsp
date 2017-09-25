@extends('layouts.users.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')
<div class="grid">
	<div class="row cells12">
<ul class="v-menu">
    <li class="menu-title">First Title</li>
    <li><a href="#"><span class="mif-home icon"></span> Home</a></li>
    <li class="divider"></li>
    <li class="menu-title">Second Title</li>
    <li><a href="#"><span class="mif-user icon"></span> Profile</a></li>
    <li><a href="#"><span class="mif-calendar icon"></span> Calendar</a></li>
    <li><a href="#"><span class="mif-image icon"></span> Photo</a></li>
    <li class="divider"></li>
    <li class="menu-title">Third Title</li>
    <li>
        <a href="#" class="dropdown-toggle"><span class="mif-my-location icon"></span> Location</a>
        <ul class="d-menu" data-role="dropdown">
            <li class="menu-title">Title for dropdown</li>
            <li><a href="#">Коллеги</a></li>
            <li><a href="#">Интересно</a></li>
            <li>
                <div class="item-block text-center">
                    <button class="square-button"><img class="icon" src="images/round.png"></button>
                    <button class="square-button"><img class="icon" src="images/location.png"></button>
                    <button class="square-button"><img class="icon" src="images/group.png"></button>
                </div>
            </li>
            <li>
                <a href="#" class="dropdown-toggle">Еще...</a>
                <ul  class="d-menu" data-role="dropdown">
                    <li><a href="#">Коллеги</a></li>
                    <li><a href="#">Интересно</a></li>
                    <li>
                        <div class="item-block text-center bg-grayLighter">
                            <button class="round-button"><img class="icon" src="images/round.png"></button>
                            <button class="round-button"><img class="icon" src="images/location.png"></button>
                            <button class="round-button"><img class="icon" src="images/group.png"></button>
                            <button class="round-button"><img class="icon" src="images/power.png"></button>
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>
            </li>
        </ul>
    </li>
    <li><a href="#"><span class="mif-bubbles icon"></span> Community</a></li>
</ul>

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
