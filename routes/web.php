<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\example\FirstController;
use App\Http\Controllers\InvokableController;
use App\Http\Controllers\SecondController;

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
    return view("welcome");
});

//Route::get('/test',[SecondController::class,'test1'])->name('test.one');


//for about
// Route::get('/about', function () {
//     return view('about');
// });

// Route::get(md5('/about'),function(){
//     return view('about');
// })->name('about.us');

Route::get(md5('/about'),[FirstController::class,'aboutIndex'])->name('about.us');

Route::post('/about/store',[FirstController::class,'AboutStor'])->name('about.store');

//For Contact
// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get(md5('/contact'), function () {
//     return view('contact');
// })->name('contact.us');

Route::get(md5('/contact'),[FirstController::class,'contactIndex'])->name('contact.us');

//For Rimon
// Route::get('/rimon',function(){
//     return view('rimon');
// });

// Route::get(md5('/rimon'),function(){
//     return view('rimon');
// })->name('rimon.us');

// Route::get('/rimon1',function(){
//     return view('rimon');
// })->middleware('rimon');

Route::get(md5('/rimon'),[FirstController::class,'rimon'])->name('rimon.us');

Route::get('/rimon1',[FirstController::class,'rimon'])->name('rimon1')->middleware('rimon');

Route::get('/testone',[SecondController::class,'test']);

Route::get('/test1', InvokableController::class);

// User name
Route::get('/mohirimon',[FirstController::class,'userName'])->name('username.us');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
