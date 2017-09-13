@extends('layouts.app-operator2')

@section('pageTitle', 'Kategori')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ url('operator/kategori/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah Kategori</button></a>
        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <?php $i = 1; ?>
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Isi</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
          @foreach($kategori as $key)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ substr($key->nama_sp, 0, 30) }}</td>
            <td>{{ substr($key->isi, 0, 50) }}...</td>
            <td> <a href="{{ url('assets/kategori/'.$key->image) }}" target="_blank"><img style="width:50px; height:50px;" src="{{ url('assets/kategori/'.$key->image) }}"></a></td>
            <td>
              <form action="{{ url('operator/kategori/'.$key->id) }}" method="post">
                <a href="{{ url('operator/kategori/'.$key->id.'/edit')}}"><button type="button" class="btn btn-info"><i class="fa fa-th-list"></i></button></a>
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>

@endsection
