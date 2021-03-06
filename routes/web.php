<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LogisticaReversaController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('logisticaReversa', [LogisticaReversaController::class, 'index'])->name('logisticaReversa.index');
    Route::get('prePostagem', [LogisticaReversaController::class, 'prePostagem'])->name('logisticaReversa.prePostagem');
    Route::post('solicitarPostagem/{numero}', [LogisticaReversaController::class, 'solicitarPostagem'])->name('solicitarPostagem');
});

Route::get('053ff33039481a62afefdbf967952a0d8facd660', function () {
    Artisan::call('clear-compiled');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('migrate --force');
    return "Okkk";
});
