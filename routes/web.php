<?php
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@index');

Route::group(['prefix' => 'sertifikasi'], function(){
  Route::get('/', 'SertifikasiController@kategori');
  Route::get('/{slug}', 'SertifikasiController@jadwal');
  Route::get('{slug1}/{slug2}', 'SertifikasiController@show_jadwal');
});

Route::get('/profil', function(){ return view('profil'); });

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
  });
});
