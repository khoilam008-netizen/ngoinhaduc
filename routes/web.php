<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/lich-hoc', function () {
    return view('lichhoc');
})->name('lich-hoc');

Route::get('/lich-thi', function () {
    return view('lichthi');
})->name('lich-thi');

Route::group(['prefix' => 'gioi-thieu'], function () {
    Route::get('/ngoi-nha-duc', function () {
        return view('gioithieu.ngoinhaduc');
    })->name('gioi-thieu.ngoi-nha-duc');
});

Route::group(['prefix' => 'thu-vien'], function () {
    Route::get('/anh', function () {
        return view('thuvien.anh');
    })->name('thu-vien.anh');
});

Route::group(['prefix' => 'dang-ky'], function () {
    Route::get('/dang-ky-nhap-hoc', function () {
        return view('dangky.nhaphoc');
    })->name('dang-ky.nhap-hoc');

    Route::get('/dang-ky-du-thi', function () {
        return view('dangky.duthi');
    })->name('dang-ky.du-thi');
});

Route::get('/lien-he', function () {
    return view('lienhe');
})->name('lien-he');
