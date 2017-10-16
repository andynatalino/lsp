@extends('layouts.admin.app-admin')

@section('pageTitle', 'Users')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ url('admin/user/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah User</button></a>
      </div>   
      <div class="box-body table-responsive">
        <?php $i = 1; ?>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <td>No</td>
              <td>No Indentitas</td>
              <td>Nama</td>
              <td>Email</td>
              <td>Status</td>
              <td>Action</td>
            </tr>
          </thead>
             <tbody>
          @foreach($users as $key)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ substr($key->number, 0, 30) }}</td>
            <td>{{ substr($key->name, 0, 30) }}</td>
            <td>{{ substr($key->email, 0, 50) }}</td>
            <td>
              @if($key->role == 3) <p class="text-primary"> Operator </p> @elseif($key->role == 2)<p class="text-success"> Admin </p>@elseif($key->role == 1) <p class="text-warning"> User </p> @endif
            </td>
            <td>

               <div class="form-group">
                  <select class="form-control" onchange="location = this.value;">
                    <option selected disabled>Opsi</option>
                    <option value="{{ url('admin/user/'.$key->username.'/edit')}}">Edit</option>
                    <option value="asds.php">Delete</option>
                    <option>Ganti Password</option>                                    
                  </select>
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

<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>

@endsection
