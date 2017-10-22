<?php
use Faker\Factory as Faker;
Auth::routes();
Route::get('insert',function ()
{
  $i = 1;
  $faker = Faker::create();
  foreach (range(1,500) as $index) {
    DB::table('users')->insert([            
      'number' => $i++,
      'username' => $faker->name,
      'name' => $faker->name,
      'email' => $faker->email,
      'password' => '$2y$10$CmhtuUx3WMi2xQIoRIQn9O1/mLKdLwI0/Cns0SLfUXE0I1bhmtqLO',   
      'role' => '1',
    ]);
  }

  die('berhasil');

});
Route::get('logout',function ()
{
 return redirect(url('login'));
});
Route::get('/', 'IndexController@index');
Route::post('/pelatihan', 'SertifikasiController@submit');
Route::get('/pelatihan', 'SertifikasiController@redirect');

Route::group(['prefix' => 'pembayaran'], function(){
  Route::get('/', 'SertifikasiController@pembayaran');  
  Route::post('/', 'SertifikasiController@pembayaran_next');  
  // Route::get('/checkout/{id}', 'SertifikasiController@pembayaran_checkout');  
  Route::post('/checkout', 'SertifikasiController@pembayaran_checkout_save');
  Route::get('/checkout/informasipembayaran/', 'SertifikasiController@pembayaran_informasi'); 
  Route::post('/checkout/informasipembayaran/', 'SertifikasiController@pembayaran_informasi_save'); 
  Route::get('/checkout/konfirmasi/{id}', 'SertifikasiController@pembayaran_konfirmasi');  
  Route::delete('/{id}', 'SertifikasiController@pembayaran_delete');
  Route::post('/daftar', 'SertifikasiController@daftar');
});
Route::get('/galeri', function(){ return view('users.galeri.galeri'); });
Route::get('/kontak', function(){ return view('users.kontak.kontak'); });
Route::get('/tentang', 'IndexController@tentang');

Route::group(['prefix' => 'profil'], function(){
  Route::get('/', 'ProfileController@index');
  Route::get('/konfirmasi', 'ProfileController@konfirmasi');
  Route::post('/konfirmasi', 'ProfileController@konfirmasi_save');
  Route::get('/transaksisaya', 'ProfileController@transaksisaya');
  Route::get('/{slug}/change-photo', 'ProfileController@change_photo');
  Route::post('/{slug}/change-photo', 'ProfileController@change_photo_save');
  Route::get('/{slug}/change-email', 'ProfileController@change_email');
  Route::post('/{slug}/change-email', 'ProfileController@change_email_save');
  Route::get('/{slug}/change-password', 'ProfileController@change_password');
  Route::post('/{slug}/change-password', 'ProfileController@change_password_save');
  Route::get('/{slug}/change-data', 'ProfileController@change_data');
  Route::post('/{slug}/change-data', 'ProfileController@change_data_save');
  Route::get('{id}/pdf', 'ProfileController@pdf');
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
   Route::get('/settings', 'adminController@settings');
   Route::post('/settings', 'adminController@save_settings');
   Route::group(['prefix' => 'user'], function(){
    Route::get('/', 'adminController@user');
    Route::get('/buat', 'adminController@buat_user');
    Route::post('/', 'adminController@user_save');
    Route::get('/{id}/edit', 'adminController@user_edit');
    Route::post('/{id}', 'adminController@user_update');
    Route::delete('/{id}', 'adminController@user_delete');
  });
   Route::group(['prefix' => 'galeri'], function(){
    Route::get('/', 'adminController@galeri');
    Route::get('/buat', 'adminController@buat_galeri');
    Route::post('/', 'adminController@galeri_save');
    Route::get('/{id}/edit', 'adminController@galeri_edit');
    Route::post('/{id}', 'adminController@galeri_update');
    Route::delete('/{id}', 'adminController@galeri_delete');
  });
   Route::group(['prefix' => 'tentang'], function(){
    Route::get('/', 'adminController@tentang');
    Route::get('/buat', 'adminController@buat_tentang');
    Route::post('/', 'adminController@tentang_save');
    Route::get('/{id}/edit', 'adminController@tentang_edit');
    Route::post('/{id}', 'adminController@tentang_update');
    Route::delete('/{id}', 'adminController@tentang_delete');
  });
   Route::group(['prefix' => 'kontak'], function(){
    Route::get('/', 'adminController@tentang');
    Route::get('/buat', 'adminController@buat_kontak');
    Route::post('/', 'adminController@kontak_save');
    Route::get('/{id}/edit', 'adminController@kontak_edit');
    Route::post('/{id}', 'adminController@kontak_update');
    Route::delete('/{id}', 'adminController@kontak_delete');
  });
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
      Route::get('/', 'opController@konfirmasi_bank');
      Route::get('/tunai', 'opController@konfirmasi_tunai');
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
