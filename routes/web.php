<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get("/login","AuthController@login")->name("login");

Route::post("/login","AuthController@postLogin")->name("postLogin");
Route::get("/logout","AuthController@logout")->name("logout");

Route::get("/","FrontPage\HomeController@index")->name("index");
Route::get("/koleksi","FrontPage\KoleksiController@index")->name("koleksi");
Route::get("/koleksi/{id}","FrontPage\KoleksiController@detail")->name("koleksi.detail");
Route::get("/berita","FrontPage\BeritaController@index")->name("berita");
Route::get("/berita/{id}","FrontPage\BeritaController@detail")->name("berita.detail");

Route::get("/event","FrontPage\EventController@index")->name("event");
Route::get("/event/{id}","FrontPage\EventController@detail")->name("event.detail");

Route::get("/kontak","FrontPage\KontakController@index")->name("kontak");
Route::post("/kontak","FrontPage\KontakController@store")->name("kontak.store");
Route::get("/tentang","FrontPage\TentangController@index")->name("tentang");


Route::group(['middleware' => ['auth'],'prefix'=>'dashboard'], function(){
    Route::get("/","Dashboard\DashboardController@index")->name("admin.dashboard.index");

    Route::group(['prefix'=>'jenis'], function(){
        Route::get("/","Dashboard\JenisController@index")->name("admin.jenis.index");
        Route::get("/create","Dashboard\JenisController@create")->name("admin.jenis.create");
        Route::get("/{id}","Dashboard\JenisController@edit")->name("admin.jenis.edit");
        Route::get("/delete/{id}","Dashboard\JenisController@delete")->name("admin.jenis.delete");
        Route::post("/","Dashboard\JenisController@store")->name("admin.jenis.store");
        Route::patch("/","Dashboard\JenisController@update")->name("admin.jenis.update");
    });

    Route::group(['prefix'=>'berita'], function(){
        Route::get("/","Dashboard\BeritaController@index")->name("admin.berita.index");
        Route::get("/create","Dashboard\BeritaController@create")->name("admin.berita.create");
        Route::get("/{id}","Dashboard\BeritaController@edit")->name("admin.berita.edit");
        Route::get("/delete/{id}","Dashboard\BeritaController@delete")->name("admin.berita.delete");
        Route::post("/","Dashboard\BeritaController@store")->name("admin.berita.store");
        Route::patch("/","Dashboard\BeritaController@update")->name("admin.berita.update");
    });

    Route::group(['prefix'=>'koleksi'], function(){
        Route::get("/","Dashboard\KoleksiController@index")->name("admin.koleksi.index");
        Route::get("/create","Dashboard\KoleksiController@create")->name("admin.koleksi.create");
        Route::get("/{id}","Dashboard\KoleksiController@edit")->name("admin.koleksi.edit");
        Route::get("/delete/{id}","Dashboard\KoleksiController@delete")->name("admin.koleksi.delete");
        Route::post("/","Dashboard\KoleksiController@store")->name("admin.koleksi.store");
        Route::patch("/","Dashboard\KoleksiController@update")->name("admin.koleksi.update");
        Route::get("/export/word-table","Dashboard\KoleksiController@exportToWordTable")->name("admin.koleksi.export-word-table");
        Route::get("/export/word-document","Dashboard\KoleksiController@exportToWordDocument")->name("admin.koleksi.export-word-document");

        Route::get("/jenis/{no_jenis}","Dashboard\KoleksiController@koleksiPerJenis")->name("admin.koleksi-perjenis.index");
    });


    Route::group(['prefix'=>'slider'], function(){
        Route::get("/","Dashboard\SliderController@index")->name("admin.slider.index");
        Route::get("/create","Dashboard\SliderController@create")->name("admin.slider.create");
        Route::get("/{id}","Dashboard\SliderController@edit")->name("admin.slider.edit");
        Route::get("/delete/{id}","Dashboard\SliderController@delete")->name("admin.slider.delete");
        Route::post("/","Dashboard\SliderController@store")->name("admin.slider.store");
        Route::patch("/","Dashboard\SliderController@update")->name("admin.slider.update");
    });

    Route::group(['prefix'=>'event'], function(){
        Route::get("/","Dashboard\EventController@index")->name("admin.event.index");
        Route::get("/create","Dashboard\EventController@create")->name("admin.event.create");
        Route::get("/{id}","Dashboard\EventController@edit")->name("admin.event.edit");
        Route::get("/delete/{id}","Dashboard\EventController@delete")->name("admin.event.delete");
        Route::post("/","Dashboard\EventController@store")->name("admin.event.store");
        Route::patch("/","Dashboard\EventController@update")->name("admin.event.update");
    });

    Route::group(['prefix'=>'tentang'], function(){
        Route::get("profil","Dashboard\TentangController@profilIndex")->name("admin.tentang.profil.index");
        Route::patch("profil","Dashboard\TentangController@profilUpdate")->name("admin.tentang.profil.update");
        Route::get("sejarah","Dashboard\TentangController@sejarahIndex")->name("admin.tentang.sejarah.index");
        Route::patch("sejarah","Dashboard\TentangController@sejarahUpdate")->name("admin.tentang.sejarah.update");
        Route::get("visimisi","Dashboard\TentangController@visimisiIndex")->name("admin.tentang.visimisi.index");
        Route::patch("visimisi","Dashboard\TentangController@visimisiUpdate")->name("admin.tentang.visimisi.update");
        Route::get("struktur","Dashboard\TentangController@strukturIndex")->name("admin.tentang.struktur.index");
        Route::patch("struktur","Dashboard\TentangController@strukturUpdate")->name("admin.tentang.struktur.update");
        Route::get("tugas","Dashboard\TentangController@tugasIndex")->name("admin.tentang.tugas.index");
        Route::patch("tugas","Dashboard\TentangController@tugasUpdate")->name("admin.tentang.tugas.update");
    });

    Route::group(['prefix'=>'kontak'], function(){
        Route::get("/","Dashboard\KontakController@index")->name("admin.kontak.index");
        Route::get("/{id}","Dashboard\KontakController@detail")->name("admin.kontak.detail");
    });
});