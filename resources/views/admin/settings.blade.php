@extends('layouts.app-admin')
@section('title')
  Profil Perusahaan
@endsection

@section('content')
<div class="page-content">
  <div class="flex-grid no-responsive-future" style="height: 100%;">
    <div class="row" style="height: 100%">
      <div class="cell size-x200" id="cell-sidebar" style="background-color: #0072c6; height: 100%">
        <ul class="sidebar navy" style="background-color: #0072c6;">
          <li><a href="{{ url('admin') }}">
            <span class="mif-apps icon"></span>
            <span class="title">dashboard</span>
            <span class="counter">123</span>
          </a></li>
          <li><a href="{{ url('admin/user') }}">
            <span class="mif-users icon"></span>
            <span class="title">Users</span>
            <span class="counter">0</span>
          </a></li>
          <li class="active"><a href="{{ url('admin/settings') }}">
            <span class="mif-drive-eta icon"></span>
            <span class="title">Virtual machines</span>
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
        <h1 class="text-light">Settings</h1>
        <hr>
      <h3>Page</h3>
      </div>
@endsection
