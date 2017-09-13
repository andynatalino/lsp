@extends('layouts.app-operator2')

@section('pageTitle', 'Jadwal')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ url('operator/jadwal/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah Jadwal</button></a>
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
            <th>Nama LSP</th>
            <th>Kategori</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Kuota</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          @foreach($jadwal as $key)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $key->nama_lsp }}</td>
            <td>{{ App\Kategori::where('id',$key->id_kategori)->first()['nama_sp'] }}</td>
            <td>{{ $key->tanggal_mulai }}</td>
            <td>{{ $key->tanggal_selesai }}</td>
             <td>{{ $key->waktu }}</td>
            <td>{{ $key->lokasi }}</td>
            <td>{{ $key->kuota }}</td>
            <th>@if($key->status == 1)<span class="label label-success"> Open @elseif($key->status == 2) <span class="label label-danger"> Expired @endif</th>
            <td>
              <form action="{{ url('operator/jadwal/'.$key->id) }}" method="post">
               <a href="{{ url('operator/jadwal/'.$key->id.'/edit')}}"><button type="button"><i class="fa fa-th-list"></i></button></a>
                <button  class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
<!-- data-toggle="modal" data-target="#myModal" -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Show Jadwal</h4>
        </div>
        <div class="modal-body">
        <h4>  Nama LSP : <input type="text" name="" class="form-control" value=""> </h4><br>
        <h4>  Kategori : LSP Komputer </h4><br>
        <h4>  Tanggal Mulai : 24-21-2132 </h4><br>
        <h4>  Tanggal Selesai : 43-12-1233 </h4><br>
        <h4>  Lokasi   : Jln. Sensus II B No. 11a RT 02 RW O4 Bidaracina Jakarta timur</h4> <br>
        <h4>  Kuota : 3 / 30 Orang </h4><br>
        <h4>  Biaya  : Rp. 300.000 ,- </h4><br>
        <h4>  Status :Pendaftaran dibuka </h4><br>
        <h4>  Nama : asdas </h4><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>

    </div>
  </div>

<script type="text/javascript">
function validation(){
  swal({
    title: "Terima atau Tidak",
    text: "Apakah data user sudah benar?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Terima, Konfrimasi",
    cancelButtonText: "Tidak, Belum benar",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      swal("Berhasil!", "Anda berhasil mengkonfirmasi data user!", "success");
    } else {
      swal("Batal", "Mohon koreksi data dengan benar!", "error");
    }
  });
}
</script>
@endsection
