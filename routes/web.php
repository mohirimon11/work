<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\example\FirstController;
use App\Http\Controllers\InvokableController;
use App\Http\Controllers\SecondController;
use App\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\ClassController;


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

//For class from Db
Route::get('class',[ClassController::class,'index'])->name('class.index');

//Class Insert page call
Route::get('create/class',[ClassController::class,'create'])->name('class.create');

//Class Insert
Route::post('class/store',[ClassController::class,'store'])->name('class.store');
























































































//Route::get('/test',[SecondController::class,'test1'])->name('test.one');


//for about
// Route::get('/about', function () {
//     return view('about');
// });

// Route::get(md5('/about'),function(){
//     return view('about');
// })->name('about.us');

Route::get(md5('/about'),[FirstController::class,'aboutIndex'])->middleware(['auth'])->name('about.us');

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

Route::get('/form',[FirstController::class,'load'])->name('form.us')->middleware('auth','verified');


Route::post('/form/form',[FirstController::class,'form'])->name('form.post');

Route::get('/error',[FirstController::class,'error']);


Route::get('/testlog', function(Request $request){
    $logfile=file(storage_path().'/logs/form.php');
    $collection=[];
    foreach($logfile as $line_number =>$line){
        $collection[]=array('line'=>$line_number,'content'=>htmlspecialchars($line));

    }
    dd($collection);
});

Route::get('email/verify/{id}/{hash}', function(EmailCerificationRequest $request){
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth','signed'])->name('verification.verify');

//This Route for email verification
// Route::get('email/verify', function(){
//     return view('auth.verify');
// })->middleware('auth')->name('verification.notice');

//for send verification email
Route::get('email/verify',function(){
    return view('auth.verify-email');
})->middleware('auth');

//For resent verification email
Route::get('resent-email',[PasswordResetLinkController::class,'createn'])->name('verification.resend');

//For user id pass
Route::get('user/detail/{id}',[UserController::class,'details'])->name('view.detail');

//For year count
Route::get('year/count/{year}',[UserController::class,'year'])->name('number.us');

//For password change
Route::get('/password/change',[FirstController::class,'passwordChange'])->name('change.password')->middleware('verified');

//For password update
Route::post('/password/update',[FirstController::class,'updatePassword'])->name('update.password')->middleware('verified');

//
Route::post('/password',[FirstController::class,'password'])->name('data.password');

//for test
Route::get('/home',[SecondController::class,'home']);


//For Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
