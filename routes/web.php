<?php

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

Route::get('/', function () {
    return view('home');
});


Route::view('/','home');
// Route::view('/{any}','home');
// Route::view('/{any}/{any1}','home');
// 
// 
// 
// 

Route::any('{any}', function () {
    return view('home');
})->where('any', '.*');


Route::view('/{any}/{any1}','home');

// Route::get('/{vue_capture?}', function () {
//  return view('home');
// })->where('vue_capture', '[\/\w\.-]*');


// Route::get('/{vue_capture?}/{vue_captureee?}', function () {
//  return view('home');
// })->where('vue_capture', '[\/\w\.-]*');
