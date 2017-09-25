<?php
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@index');
Route::post('/pelatihan', 'SertifikasiController@submit');
Route::get('/pelatihan', 'SertifikasiController@redirect');

Route::group(['prefix' => 'pembayaran'], function(){
  Route::get('/', 'SertifikasiController@pembayaran');  
  Route::post('/', 'SertifikasiController@pembayaran_next');  
  // Route::get('/checkout/{id}', 'SertifikasiController@pembayaran_checkout');  
  Route::post('/checkout/', 'SertifikasiController@pembayaran_checkout_save');
  Route::get('/checkout/informasipembayaran/', 'SertifikasiController@pembayaran_informasi'); 
  Route::post('/checkout/informasipembayaran/', 'SertifikasiController@pembayaran_informasi_save'); 
  Route::get('/checkout/konfirmasi/{id}', 'SertifikasiController@pembayaran_konfirmasi');  
  Route::delete('/{id}', 'SertifikasiController@pembayaran_delete');
  Route::post('/daftar', 'SertifikasiController@daftar');
});
Route::get('/tentang', function(){ return view('profil'); });

Route::group(['prefix' => 'profil'], function(){
  Route::get('/', 'ProfileController@index');
  Route::get('/konfirmasi', 'ProfileController@konfirmasi');
  Route::post('/konfirmasi', 'ProfileController@konfirmasi_save');
});

Route::group(['prefix' => 'sertifikasi'], function(){
  Route::get('/', 'SertifikasiController@kategori');
  Route::get('/{slug}', 'SertifikasiController@jadwal');
  Route::get('{slug1}/{slug2}', 'SertifikasiController@show_jadwal');  
});

Route::group(['prefix' => 'berita'], function(){
  Route::get('/', 'IndexController@berita_all');
  Route::get('/{slug}', 'IndexController@berita_show');
});

Route::group(['prefix' => 'admin'], function(){
  Route::group(['middleware' => 'admin'], function(){
    Route::get('/', 'adminController@dashboard');
    Route::get('/user', 'adminController@users_all');
    Route::get('/user/{id}', 'adminController@show');
    Route::get('/settings', function(){ return view('admin/settings'); });
  });
});

Route::group(['prefix' => 'operator'], function(){
  Route::group(['middleware' => 'op'], function(){
    Route::get('/', 'opController@index'); // Route::get('/', 'opController@dashboard');
    Route::group(['prefix' => 'berita'], function(){
      Route::get('/', 'opController@berita');
      Route::get('/buat', 'opController@buat_berita');
      Route::post('/', 'opController@berita_save');
      Route::get('/{id}/edit', 'opController@berita_edit');
      Route::post('/{id}', 'opController@berita_update');
      Route::delete('/{id}', 'opController@berita_delete');
    });
    Route::group(['prefix' => 'slider'], function(){
      Route::get('/', 'opController@slider_all');
      Route::get('/buat', 'opController@buat_slider');
      Route::post('/', 'opController@save_slider');
      Route::get('/{id}/edit', 'opController@slider_edit');
      Route::post('/{id}', 'opController@slider_update');
      Route::delete('/{id}', 'opController@slider_delete');
    });
    Route::group(['prefix' => 'kategori'], function(){
      Route::get('/', 'opController@kategori_all');
      Route::get('/buat', 'opController@kategori_buat');
      Route::post('/', 'opController@kategori_save');
      Route::get('/{id}', 'opController@kategori_show');
      Route::get('/{id}/edit', 'opController@kategori_edit');
      Route::post('/{id}', 'opController@kategori_update');
      Route::delete('/{id}', 'opController@kategori_delete');
    });
    Route::group(['prefix' => 'jadwal'], function(){
      Route::get('/', 'opController@jadwal_all');
      Route::get('/buat', 'opController@jadwal_buat');
      Route::post('/', 'opController@jadwal_save');
      Route::get('/{id}/edit', 'opController@jadwal_edit');
      Route::post('/{id}', 'opController@jadwal_update');
      Route::delete('/{id}', 'opController@jadwal_delete');
    });
    Route::group(['prefix' => 'pembayaran'], function(){
      Route::get('/', 'opController@pembayaran_all');
      Route::get('/buat', 'opController@pembayaran_buat');
      Route::post('/', 'opController@pembayaran_save');
      Route::get('/{id}/edit', 'opController@pembayaran_edit');
      Route::post('/{id}', 'opController@pembayaran_update');
      Route::delete('/{id}', 'opController@pembayaran_delete');
    });
    Route::group(['prefix' => 'konfirmasi'], function(){
      Route::get('/', 'opController@konfirmasi_all');
      Route::post('/{id}', 'opController@konfirmasi_update');
      Route::delete('/{id}', 'opController@konfirmasi_delete');
    });
    Route::group(['prefix' => 'transaksi'], function(){
      Route::get('/', 'opController@transaksi_all');
      Route::get('/buat', 'opController@transaksi_buat');
      Route::post('/', 'opController@transaksi_save');
      Route::get('/{id}/edit', 'opController@transaksi_edit');
      Route::post('/{id}', 'opController@transaksi_update');
      Route::delete('/{id}', 'opController@transaksi_delete');
    });
    Route::group(['prefix' => 'laporan'], function(){
      Route::get('/', 'opController@laporan');
    });
  });
});
