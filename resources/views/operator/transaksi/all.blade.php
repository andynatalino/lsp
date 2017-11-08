@extends('layouts.op.app-operator')

@section('pageTitle', 'Transaksi')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <br>        
        <div class="box-tools">
          <form method="get" action="{{ url('operator/transaksi/search') }}">                     
            <div class="input-group input-group-xs" style="width: 400px;">
              <input type="text" name="q" class="form-control pull-right" placeholder="No. Pembayaran">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="box-body table-responsive">
        <?php $i = 1; 

 $pem = App\Pembayaran::get();  

        ?>
        @if(sizeof($pem)==0)
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No. Pembayaran</th>
              <th>User</th>
              <th>Jadwal</th>
              <th>Tipe Pembayaran</th>
              <th>Tanggal Konfirmasi</th>
              <th>Tanggal transaksi</th>
            </tr>
          </thead>          
        </table>
        @else
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No. Pembayaran</th>
              <th>User</th>
              <th>Jadwal</th>
              <th>Tipe Pembayaran</th>
              <th>Tanggal Konfirmasi</th>
              <th>Tanggal transaksi</th>
            </tr>
          </thead>
          <?php $no = 1;?>
          <tbody>
            @foreach($transaksi as $key)
            <tr>
              <td>{{ $key->id }}</td>
              <td>{{ $key->user->name }}</td>
              <td>LSP Komputer</td>
              <td>{{ $key->pembayaran->nama_bank }}</td>
              <td>{{ date('D, F jS Y \a\t h:i a', strtotime($key->tanggal_konfirmasi)) }}</td>
              <td>{{ date('D, F jS Y \a\t h:i a', strtotime($key->tanggal_transaksi)) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
@endif
      </div>
    </div>
  </div>
</div>
@endsection