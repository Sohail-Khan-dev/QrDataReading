<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
    return view('welcome');
}); // ->middleware((['auth','verified']));

Route::get('/Eservices/Health/issue/PrintedLicences/{id}',[RecordController::class,'show'])->name('record.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::view('test','index');
// Route::get('test',[RecordController::class,'generateQrCode']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/qrtest',function(){
    $string = 'this is test';
    $string1 = 'this is test';
    $string2 = 'this is test';
    $string3 = 'this is test';
    $qr_code = QrCode::size(200)->style('square')->margin(2)->backgroundcolor(255, 254, 255)->color(0,0,0)
        ->encoding('ISO-8859-1')->errorCorrection('M')
        ->generate("testing that it mpt is working" . $string .$string1.$string2);

    return $qr_code;
});
Route::get("/test/{correction?}/{encoding?}", function($correction="ISO-8859-1",$encoding="L"){
    return view('test', compact('correction', 'encoding'));
});
require __DIR__.'/auth.php';
