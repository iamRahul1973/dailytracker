<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Trackersheet;

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

Route::middleware(['auth'])->group(function () {
    Route::get('trackersheet', Trackersheet::class)->name('trackersheet');
});

require __DIR__ . '/auth.php';

function minutesToHours($mins)
{
    return intdiv($mins, 60) . ':' . ($mins % 60);
}
