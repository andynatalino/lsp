@extends('layouts.op.app-operator')

@section('pageTitle', 'Berita')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ url('operator/berita/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah Berita</button></a>
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
            <th>Judul</th>
            <th>Dibuat</th>
            <th>Diperbarui</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
          @foreach($berita as $key)
          <tr>
            <td>{{ substr($key->judul, 0, 30) }}</td>
            <td>...</td>
            <td>...</td>
            <td> <a href="{{ url('assets/berita/'.$key->image) }}" target="_blank"><img style="width:50px; height:50px;" src="{{ url('assets/berita/'.$key->image) }}"></a></td>
            <td>
              <form action="{{ url('operator/berita/')}}" method="post">
               <a href="{{ url('operator/berita/'.$key->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-th-list"></i> Edit</a>
               <button id="btn-delete" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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

{{ $berita->links() }}

@section('js')
<script type="text/javascript">
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
