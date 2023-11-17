<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\GroupsController;
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
Route::get('/phpinfo', function () {
    return view('phpinfo');
});

// Route::get('groups', function () {
//     return view('groups');
// });
Route::get('/groups', [GroupsController::class, 'index'])->name('groups.index');

Route::get('/groups/create', [GroupsController::class, 'create'])->name('groups.create');
Route::post('/groups/store', [GroupsController::class, 'store'])->name('groups.store');


Route::get('groups/{group}/edit', [GroupsController::class, 'edit'])->name("groups.edit");
Route::patch('groups/{group}', [GroupsController::class, 'update'])->name("groups.update");

Route::delete('groups/{group}', [GroupsController::class, 'destroy'])->name('groups.destroy');

Route::get('/', function () {
    return view('app');
});
// Route::resource('groups', GroupsController::class);