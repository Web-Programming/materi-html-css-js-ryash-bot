<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    echo "Hello world";
});
Route::get('/profile', function () {
    echo "Nama : hafix <br>";
    echo "NPM : 123345";
});

Route::get('/biodata/{nama}/{npm}', function ($nama,$npm) {
    echo "Nama :" .$nama. " <br>";
    echo "NPM : 123345" .$nama. "<br>";
});

use App\Http\Controllers\BarangController;
route::get("/barang" , [BarangController::class,"index"]);
