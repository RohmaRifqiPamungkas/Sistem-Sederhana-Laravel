<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakBukuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "hello World";
});

Route::get('/coba/{id}', function (string $id) {
    return view('coba', ['id' => $id]);
});

Route::view('/biodata', 'biodata');

// Route::get('/biodata', function (Request $request) {
//     $output = "nama: . $request->nama. <br>
//                 email: . $request->email. <br>
//                 no. HP: . $request->no_hp. ";
//     return $output;
// });

Route::get('/buku', function (Request $request) {
    $data = [];
    $data['poin'] = 83;
    $data['flag'] = '2';
    $data['sub_judul'] = 'Latihan parsing data di view';
    $data['buku'] = ['buku 1', 'buku 2', 'buku 3'];

    return view('buku.list', $data);
});

Route::resource('/rak_buku', RakBukuController::class);
