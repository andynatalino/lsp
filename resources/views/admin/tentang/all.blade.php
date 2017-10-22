@extends('layouts.admin.app-admin')

@section('pageTitle', 'Tentang')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ url('admin/tentang/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah Tentang</button></a>
      </div>   
      <div class="box-body table-responsive">
        <?php $i = 1; ?>
        <table id="datab" class="table table-bordered table-striped">
          <thead>
            <tr>
              <td>No</td>
              <td>Judul</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            @foreach($tentang as $key)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ substr($key->judul, 0, 30) }}</td>
              <td>
               <div class="form-group">
            <a href="{{ url('admin/tentang/'.$key->id.'/edit')}}"><button type="button" class="btn btn-info">Edit</button></a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                  Delete
                </button>
             </div>  
           </td>
         </tr>
         @endforeach
       </tbody>
     </table>
   </div>      
 </div>
</div>
</div>
              
<div class="modal modal-danger fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete User</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin menghapus user?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button> 
           <form action="{{ url('admin/tentang/'.$key->id)}}" method="post">
          <button type="submit"  onclick="return confirm('Are you sure to delete?')" class="btn btn-outline">Hapus</button>
          <input type="hidden" name="_method" value="DELETE">
                 {{ csrf_field() }}
               </form>
                
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



  @endsection
