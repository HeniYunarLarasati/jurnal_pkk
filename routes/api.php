<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'PetugasController@register');
Route::post('login', 'PetugasController@login');
        Route::get('/', function(){
            return Auth::user()->level;
        })->middleware('jwt.verify');

Route::get('user','PetugasController@getAuthenticatedUser');

//mapel
Route::post('/mapel','MapelController@store')->middleware('jwt.verify');
Route::put('/mapel/{id}','MapelController@update')->middleware('jwt.verify');
Route::delete('/mapel/{id}','MapelController@hapus')->middleware('jwt.verify');
Route::get('/mapel','MapelController@tampil')->middleware('jwt.verify');

//dairy
Route::post('/diary','DiaryController@store')->middleware('jwt.verify');
Route::put('/diary/{id}','DiaryController@update')->middleware('jwt.verify');
Route::delete('/diary/{id}','DiaryController@hapus')->middleware('jwt.verify');
Route::get('/diary','DiaryController@tampil')->middleware('jwt.verify');

//reminder
Route::post('/reminder','ReminderController@store')->middleware('jwt.verify');
Route::put('/reminder/{id}','ReminderController@update')->middleware('jwt.verify');
Route::delete('/reminder/{id}','ReminderController@hapus')->middleware('jwt.verify');
Route::get('/reminder','ReminderController@tampil')->middleware('jwt.verify');

//buku
Route::post('/buku','BukuController@store')->middleware('jwt.verify');
Route::put('/buku/{id}','BukuController@update')->middleware('jwt.verify');
Route::delete('/buku/{id}','BukuController@hapus')->middleware('jwt.verify');
Route::get('/buku','BukuController@tampil');

//detail
Route::post('/detail','TransaksiController@simpan')->middleware('jwt.verify');
Route::put('/detail/{id}','TransaksiController@ubah')->middleware('jwt.verify');
Route::delete('/detail/{id}','TransaksiController@destroy')->middleware('jwt.verify');
Route::get('/detail','TransaksiController@tampil_detail')->middleware('jwt.verify');

//transaksi
Route::post('/transaksi','TransaksiController@store')->middleware('jwt.verify');
Route::put('/transaksi/{id}','TransaksiController@update')->middleware('jwt.verify');
Route::delete('/transaksi/{id}','TransaksiController@hapus')->middleware('jwt.verify');

//report
Route::get('/report/{tgl_transaksi}/{tgl_selesai}','DetailController@report')->middleware('jwt.verify');
