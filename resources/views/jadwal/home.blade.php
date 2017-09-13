@extends('layouts.app')
@section('title')
Jadwal Home
@endsection

@section('content')

<div class="grid">
  <div class="row cells12">
    <div class="cell colspan8">
      <h1><b>S</b>istem <b>I</b>nfor<b>M</b>asi<b>PEL</b>atihan</h1>
    </div>
    <div class="cell colspan4">
      <div class="panel">
        <div class="heading">
          <span class="icon">
            <span class="mif-user-check mif-ani-heartbeat"></span>
          </span>
          <span class="title">Sign In</span>
        </div>
        <div class="content">
          Sign In to Your Account :)
          <hr>
          <span class="place-right"><a href="http://it-club.smkn10jakarta.sch.id/auth/login" class="button">Sign In</a> or <a href="http://it-club.smkn10jakarta.sch.id/auth/register" class="button">Sign Up</a></span>
          <div style="margin-top:30px;">&nbsp;</div>
        </div>
      </div>
      <div class="countdown" data-role="countdown" data-days="100"></div>
      <h1>Role 1 =  User</h1> <a href="/">user</a><br>
      <h1>Role 2 =  Admin</h1> <a href="/admin">admin</a><br>
      <h1>Role 3 = Operator</h1> <a href="/op">operator</a>
    </div>
  </div>
</div>
@endsection
