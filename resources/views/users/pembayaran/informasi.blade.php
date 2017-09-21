@extends('layouts.users.app')
@section('title')
Lembaga Sertifikasi Profesi
@endsection

@section('content')
<div class="grid">
  <div class="row cells12">
    <div class="cell colspan8">      
      <div class="cell">

        @foreach($bank as $key)
        <div class="panel danger collapsible collapsed" data-role="panel">
          <div class="heading">
            <span class="title">{{ $key->nama_bank }}</span>
          </div>
          <div class="content padding10">
             Pembayaran via  {{ $key->nama_bank }}, Setelah Transfer dimohon melakukan konfirmasi dengan memphoto bukti transfer Anda.
            <form action="{{ url('pembayaran/checkout/informasipembayaran') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="bank" value="{{ $key->id }}">
              <input type="hidden" name="id" value="{{ $transaksi->id }}">
              <button class="button">Konfirmasi</button>
            </form>
          </div>
        </div><br>
        @endforeach
        <div class="panel danger collapsible collapsed" data-role="panel">
          <div class="heading">
            <span class="title">Tunai</span>
          </div>
          <div class="content padding10">
           Ketentuan Pembayaran Tunai Setelah Anda memilih Pembayaran Tunai maka Anda akan mendapatkan bukti pemesanan, Anda bisa membawanya ke Kantor kami.

         </div>
       </div>
     </div>
   </div>   

   <div class="cell colspan4">
     <div class="panel danger">
      <div class="heading">
        <span class="title">Rincian Sertifikasi</span>
      </div>
      <div class="content" style="padding: 10px 10px 10px 10px;">
        <center><h2>{{ $transaksi->jadwal->nama_lsp }}</h2><br></center>
           <center><h2>{{ $transaksi->jadwal->id_transaksi }}</h2><br></center>
        <h5>12 Desember 2017 s/d 13 Desember 2017</h5><br>
        <h5>20:00 s/d 23:00 WIB</h5>
        <h5>Rp. 500.000,-</h5>       
      </form>
    </div>
  </div>
</div>
</div>
</div>
@endsection