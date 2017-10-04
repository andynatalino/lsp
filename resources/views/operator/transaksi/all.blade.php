@extends('layouts.op.app-operator')

@section('pageTitle', 'Transaksi')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <br>        
        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <?php $i = 1; ?>
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <th>User</th>
            <th>Jadwal</th>
            <th>Tipe Pembayaran</th>
            <th>Tanggal Konfirmasi</th>
            <th>Tanggal transaksi</th>
          </tr>
          <?php $no = 1;?>
          @foreach($transaksi as $key)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $key->user->name }}</td>
            <td>LSP Komputer</td>
            <td>{{ $key->pembayaran->nama_bank }}</td>
            <td>{{ date('D, F jS Y \a\t h:i a', strtotime($key->tanggal_konfirmasi)) }}</td>
            <td>{{ date('D, F jS Y \a\t h:i a', strtotime($key->tanggal_transaksi)) }}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection