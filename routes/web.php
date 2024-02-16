<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'index');

Route::controller(ListController::class)->group(function () {
    Route::get('/lists', 'show')->name('lists');
    Route::get('/lists/add', 'add')->name('lists.add');
    Route::get('/lists/edit/{id}', 'edit')->name('lists.edit');
    Route::get('/lists/delete/{id}', 'delete')->name('lists.delete');
    Route::put('/lists/item/edit/{id}', 'editItem')->name('lists.item.edit');
    Route::delete('/lists/item/delete/{id}', 'deleteItem')->name('lists.item.delete');
    Route::post('/lists/item/add', 'addItem')->name('lists.item.add');
});

// Route::controller(UserController::class)->group(function () {
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
