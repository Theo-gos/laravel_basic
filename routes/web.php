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
    Route::get('/lists/detail/{id?}', 'detail')->name('lists.detail');
    Route::get('/lists/delete/{id}', 'delete')->name('lists.delete');
});

Route::controller(UserController::class)->group(function () {
    Route::put('/users/item/edit/{id}', 'editItem')->name('users.item.edit');
    Route::delete('/users/item/delete/{id}', 'deleteItem')->name('users.item.delete');
    Route::post('/users/item/add', 'addItem')->name('users.item.add');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
