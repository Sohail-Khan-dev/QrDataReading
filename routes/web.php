<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
Route::get("qr/{id}",function($id){
    return redirect()->route('record.show', ['id' => $id]);
})->name('qr.store');
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
    $uuid = Str::uuid()->toString();
        $url = route('record.show','1'.'?uuid'.$uuid);
        // $qrCode = (new DNS2D)->getBarcodePNG($url, 'QRCODE',10,10);  //DATAMATRIX
        $qrCode = QrCode::size(200)->style('square')->margin(2)->backgroundcolor(255, 254, 255)->color(0,0,0)
        ->encoding('ISO-8859-1')->errorCorrection('M')
        ->format('svg')
        ->generate($url);
    
        $path = 'qrcodes/' . '1' . '.svg';
        Storage::disk('public')->put($path, $qrCode);
        $imgurl = $this->qrPath = Storage::url($path);
        return  $imgurl;
});

Route::get('testRead', function() {
    Storage::disk('google')->put('test.txt', 'Hello World');
});
require __DIR__.'/auth.php';
