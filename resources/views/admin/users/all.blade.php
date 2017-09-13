@extends('layouts.app-admin')
@section('title')
Data Users &raquo Admin
@endsection

@section('content')
<div class="page-content">
  <div class="flex-grid no-responsive-future" style="height: 100%;">
    <div class="row" style="height: 100%">
      <div class="cell size-x200" id="cell-sidebar" style="background-color: #0072c6; height: 100%">
        <!-- <ul class="v-menu navy min-size-required" style="background-color: #0072c6;">
          <li class="menu-title">First Title</li>
          <li><a href="#"><span class="mif-home icon"></span> Home</a></li>
          <li class="menu-title">Second Title</li>
          <li><a href="#"><span class="mif-user icon"></span> Profile</a></li>
          <li><a href="#"><span class="mif-calendar icon"></span> Calendar</a></li>
          <li><a href="#"><span class="mif-image icon"></span> Photo</a></li>
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
                    <div class="item-block text-center">
                      <button class="round-button"><img class="icon" src="images/round.png"></button>
                      <button class="round-button"><img class="icon" src="images/location.png"></button>
                      <button class="round-button"><img class="icon" src="images/group.png"></button>
                      <button class="round-button"><img class="icon" src="images/power.png"></button>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="#"><span class="mif-bubbles icon"></span> Community</a></li> -->

          <ul class="sidebar navy" style="background-color: #0072c6;">
            <li><a href="{{ url('admin') }}">
              <span class="mif-apps icon"></span>
              <span class="title">dashboard</span>
              <span class="counter">123</span>
            </a></li>
            <li class="active"><a href="{{ url('admin/user') }}">
              <span class="mif-users icon"></span>
              <span class="title">Users</span>
              <span class="counter">0</span>
            </a></li>
            <li><a href="{{ url('admin/settings') }}">
              <span class="mif-drive-eta icon"></span>
              <span class="title">Settings</span>
              <span class="counter">2</span>
            </a></li>
            <li><a href="#">
              <span class="mif-cloud icon"></span>
              <span class="title">Cloud services</span>
              <span class="counter">0</span>
            </a></li>
            <li><a href="#">
              <span class="mif-database icon"></span>
              <span class="title">SQL Databases</span>
              <span class="counter">0</span>
            </a></li>
            <li><a href="#">
              <span class="mif-cogs icon"></span>
              <span class="title">Automation</span>
              <span class="counter">0</span>
            </a></li>
            <li><a href="#">
              <span class="mif-apps icon"></span>
              <span class="title">all items</span>
              <span class="counter">0</span>
            </a></li>
          </ul>
        </div>

        <div class="cell auto-size padding20 bg-white" id="cell-content">
          <h1 class="text-light">Data Users <span class="mif-drive-eta place-right"></span></h1>
          <hr class="thin bg-grayLighter">
          <!-- <button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span> Create...</button>
          <button class="button success" onclick="pushMessage('success')"><span class="mif-play"></span> Start</button>
          <button class="button warning" onclick="pushMessage('warning')"><span class="mif-loop2"></span> Restart</button>
          <button class="button alert" onclick="pushMessage('alert')">Stop all machines</button>
          <hr class="thin bg-grayLighter"> -->
          <table class="dataTable border bordered" data-role="datatable" data-auto-width="false">
            <thead>
              <tr>
                <td style="width: 20px">
                </td>
                <td class="sortable-column sort-asc" style="width: 10px">NISN / NIK</td>
                <td class="sortable-column" style="width: 10px">Nama</td>
                <td class="sortable-column" style="width: 10px">Email</td>
                <td class="sortable-column" style="width: 10px">Status</td>
                <td style="width: 10px">Action</td>
              </tr>
            </thead>
            <?php
            $i = 1;
            ?>
            <tbody>
              @foreach($users as $key)
              <tr>
                <td>
                  <label class="input-control checkbox small-check no-margin">
                    <input type="checkbox">
                    <span>{{$i++}}</span>
                  </label>
                </td>
                <td>{{ $key->number }}</td>
                <td>{{ $key->name }}</td>
                <td>{{ $key->email }}</td>
                <td class="align-center">@if($key->role == 3)<span class="fg-yellow">Operator @elseif($key->role == 2)<span class="fg-green"> Admin @else <span class="fg-blue"> User @endif</span></td>
                <td>
                  <!-- <a href="{{url('admin/user/'.$key->number)}}"><button class="button success small-button">Lihat</button></a>
                  <button class="button primary small-button">Edit</button>
                  <button class="button danger small-button">Hapus</button> -->
                  <center>
                  <div class="dropdown-button">
                    <button class="button dropdown-toggle">Opsi</button>
                    <ul class="split-content d-menu" data-role="dropdown">
                      <li><a href="{{url('admin/user/'.$key->number)}}">Lihat</a></li>                      
                      <li><a href="#">Edit</a></li>
                      <li><a href="#">Hapus</a></li>
                    </ul>
                  </div>
                </center>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endsection
