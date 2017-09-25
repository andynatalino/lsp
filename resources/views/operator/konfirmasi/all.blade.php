@extends('layouts.op.app-operator')

@section('pageTitle', 'Konfirmasi')

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
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <?php $i = 1; ?>
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <th>User</th>
            <th>Jadwal</th>
            <th>Tipe Pembayaran</th>
            <th>Photo Bukti</th>
            <th>Action</th>
          </tr>
          <?php $no = 1;?>
          @foreach($transaksi as $key)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $key->user->name }}</td>
            <td>LSP Komputer</td>
            <td>{{ $key->pembayaran->nama_bank }}</td>
            <td> 
              <img src="{{ url('assets/bukti/'.$key->photo_bukti) }}" style="width: 50px; height: 50px;"></td>
              <td>
               <!-- Button trigger modal -->
               <form action="{{ url('operator/konfirmasi/'.$key->id) }}" method="post">
                 <input type="hidden" name="batalkan">
                 <input type="hidden" name="_method" value="DELETE">
                 {{ csrf_field() }}
                 <button 
                 type="button" 
                 class="btn btn-primary btn-sm" 
                 data-toggle="modal"
                 data-id="{{ $key->id }}"           
                 data-title="{{ $key->pembayaran->nama_bank }}"
                 data-target="#favoritesModal_{{$no}}"><i class="fa fa-check-square-o"></i> Cek
               </button>                         
               <button id="btn-delete" type="submit"class="btn btn-danger btn-sm"><i class="fa fa-window-close"></i></button>
             </form>

             <div class="modal fade" id="favoritesModal_{{$no}}" 
             tabindex="-1" role="dialog" 
             aria-labelledby="favoritesModalLabel">
             <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" 
                  data-dismiss="modal" 
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" 
                  id="favoritesModalLabel">{{ $key->user->name }} - {{ $key->pembayaran->nama_bank }}</h4>
                </div>
                <div class="modal-body"><center>
                 <img src="{{ url('assets/bukti/'.$key->photo_bukti) }}" style="width: 100%;"></center>
               </div>
               <div class="modal-footer">
                 <span class="pull-left">
                  <button type="button" class="btn btn-default" 
                  data-dismiss="modal">Close</button>
                </span>                 
                <span class="pull-right">
                 <form action="{{ url('operator/konfirmasi/'.$key->id) }}" method="post">
                  {{ csrf_field() }}
                  <button id="btn-submit" type="submit" class="btn btn-primary">
                    Konfirmasi
                  </button>
                </form>
              </span>
            </div>
          </div>
        </div>
      </div>
    </td>
  </tr>
  <?php $no++;?>
  @endforeach
</table>
</div>
</div>
</div>
</div>

@section('js')
<script type="text/javascript">
 $(function() {
  $('#favoritesModal').on("show.bs.modal", function (e) {
   $("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
   $("#fav-title").html($(e.relatedTarget).data('title'));
 });
});

 $('#btn-submit').on('click',function(e){
  e.preventDefault();
  var form = $(this).parents('form');
  swal({
    title: "Apa anda yakin?",
    text: "Data sudah benar?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, benar!",
    closeOnConfirm: false
  }, function(isConfirm){
    if (isConfirm) {
      form.submit();
      swal("Berhasil!", "Berhasil dikonfirmasi!", "success");
      setTimeout(function () {
       window.location.href = "{{ url('operator/konfirmasi')}}";
     }, 1500);
    }
  });
});

 $('#btn-delete').on('click',function(e){
  e.preventDefault();
  var form = $(this).parents('form');
  swal({
    title: "Apa anda yakin?",
    text: "Anda akan menghapus data?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Hapus!",
    closeOnConfirm: false
  }, function(isConfirm){
    if (isConfirm) {
      form.submit();
      swal("Berhasil!", "Berhasil dihapus!", "success");
      setTimeout(function () {
       window.location.href = "{{ url('operator/konfirmasi')}}";
     }, 1500);
    }
  });
});
</script>
@endsection

@endsection