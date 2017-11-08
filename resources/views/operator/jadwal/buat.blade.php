@extends('layouts.op.app-operator')

@section('pageTitle', 'Buat Jadwal')

@section('content')
<script type="text/javascript">
  $(function () {
    $('#datetimepicker1').datetimepicker();
  });
</script>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST" action="{{ url('operator/jadwal') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label>Kategori</label><br>
            <select class="selectpicker" required name="id_kategori" data-live-search="true">
              @foreach($kategori as $key)
              <option value="{{ $key->id }}" data-tokens="{{ $key->nama_sp }}">{{ $key->nama_sp }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Nama LSP</label>
            <input type="text" required class="form-control" name="nama_lsp" placeholder="Nama LSP">
          </div>
          <div class="form-group">
            <label>Tanggal Mulai</label> <?php $date = date('Y-m-d');  ?>
            <div class="input-group date" data-provide="datepicker">
              <input type="text" required name="tanggal_mulai" value="{{ date('m/d/Y ', strtotime($date)) }}" class="form-control">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal Selesai</label>
            <div class="input-group date" data-provide="datepicker">
              <input type="text" required name="tanggal_selesai" class="form-control">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Waktu</label>
            <div class="input-group bootstrap-timepicker timepicker">
              <input id="timepicker1" required name="waktu" type="text" class="form-control timepicker input-small">
              <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
            </div>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea required placeholder="Alamat" required name="lokasi" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Wilayah</label>
            <input type="text" required class="form-control" name="nama_lsp" placeholder="Nama LSP">
          </div>
          <div class="form-group">
            <label>Kuota (contoh: 30)</label>
            <input type="text" required class="form-control" required name="kuota" placeholder="Kuota">
          </div>
          <div class="form-group">
            <label>Biaya</label>
            <input type="text" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"
            required class="form-control" required name="biaya" placeholder="Biaya">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea required placeholder="Isi Deskripsi" required name="isi" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Status</label><br>
            <select name="status" required class="selectpicker">
              <option value="1">Pendaftaran dibuka</option>
              <option value="2">Pendaftaran ditutup</option>
            </select>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Buat Jadwal</button>
          <a href="{{ url('operator/jadwal') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
        </div>
      </form>
    </div>
  </div>
</div>

@section('js')
<script type="text/javascript">
  function tandaPemisahTitik(b){
    var _minus = false;
    if (b<0) _minus = true;
    b = b.toString();
    b=b.replace(".","");
    b=b.replace("-","");
    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--){
      j = j + 1;
      if (((j % 3) == 1) && (j != 1)){
        c = b.substr(i-1,1) + "." + c;
      } else {
        c = b.substr(i-1,1) + c;
      }
    }
    if (_minus) c = "-" + c ;
    return c;
  }

  function numbersonly(ini, e){
    if (e.keyCode>=49){
      if(e.keyCode<=57){
        a = ini.value.toString().replace(".","");
        b = a.replace(/[^\d]/g,"");
        b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
        ini.value = tandaPemisahTitik(b);
        return false;
      }
      else if(e.keyCode<=105){
        if(e.keyCode>=96){
//e.keycode = e.keycode - 47;
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
ini.value = tandaPemisahTitik(b);
//alert(e.keycode);
return false;
}
else {return false;}
}
else {
  return false; }
}else if (e.keyCode==48){
  a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
  b = a.replace(/[^\d]/g,"");
  if (parseFloat(b)!=0){
    ini.value = tandaPemisahTitik(b);
    return false;
  } else {
    return false;
  }
}else if (e.keyCode==95){
  a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
  b = a.replace(/[^\d]/g,"");
  if (parseFloat(b)!=0){
    ini.value = tandaPemisahTitik(b);
    return false;
  } else {
    return false;
  }
}else if (e.keyCode==8 || e.keycode==46){
  a = ini.value.replace(".","");
  b = a.replace(/[^\d]/g,"");
  b = b.substr(0,b.length -1);
  if (tandaPemisahTitik(b)!=""){
    ini.value = tandaPemisahTitik(b);
  } else {
    ini.value = "";
  }

  return false;
} else if (e.keyCode==9){
  return true;
} else if (e.keyCode==17){
  return true;
} else {
//alert (e.keyCode);
return false;
}

}

   $('.timepicker').timepicker({
      showInputs: false
    })

</script>
@endsection
@endsection
