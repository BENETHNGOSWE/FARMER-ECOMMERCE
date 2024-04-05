<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['role:super-admin|admin|mkulima|user']], function () {
    Route::resource('permissions', App\Http\Controllers\Permission\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\Permission\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\Roles\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\Roles\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\Roles\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\Roles\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', App\Http\Controllers\User\UserController::class);
    Route::get('users/{userId}/delete', [App\Http\Controllers\User\UserController::class, 'destroy']);

    // Mazao Manage Here
    Route::resource('mazao', App\Http\Controllers\Mazao\MazaoController::class);
    Route::get('mazao/edit/{mazao}', [App\Http\Controllers\Mazao\MazaoController::class, 'edit'])->name('mazaos.edit');
    Route::put('mazao/update/{mazao}', [App\Http\Controllers\Mazao\MazaoController::class, 'update'])->name('mazaos.update');
    Route::delete('mazao/delete/{mazao}', [App\Http\Controllers\Mazao\MazaoController::class, 'delete'])->name('mazaos.delete');
    Route::get('mazao/{id}', [App\Http\Controllers\Mazao\MazaoController::class, 'show'])->name('mazaos.show');

    // Pembejeo Manage Here
    Route::resource('pembejeo', App\Http\Controllers\Pembejeo\PembejeoController::class);
    Route::get('pembejeo/edit/{pembejeo}', [App\Http\Controllers\Pembejeo\PembejeoController::class, 'edit'])->name('pembejeos.edit');
    Route::put('pembejeo/update/{pembejeo}', [App\Http\Controllers\Pembejeo\PembejeoController::class, 'update'])->name('pembejeos.update');
    Route::delete('pembejeo/delete/{pembejeo}', [App\Http\Controllers\Pembejeo\PembejeoController::class, 'delete'])->name('pembejeos.delete');
    Route::get('pembejeo/{id}', [App\Http\Controllers\Pembejeo\PembejeoController::class, 'show'])->name('pembejeos.show');

     // Beizamazao Manage Here
     Route::resource('beizamazao', App\Http\Controllers\Bei\BeizamazaoController::class);
     Route::get('beizamazao/edit/{beizamazao}', [App\Http\Controllers\Bei\BeizamazaoController::class, 'edit'])->name('beizamazaos.edit');
     Route::put('beizamazao/update/{beizamazao}', [App\Http\Controllers\Bei\BeizamazaoController::class, 'update'])->name('beizamazaos.update');
     Route::delete('beizamazao/delete/{beizamazao}', [App\Http\Controllers\Bei\BeizamazaoController::class, 'delete'])->name('beizamazaos.delete');
     Route::get('beizamazao/{id}', [App\Http\Controllers\Bei\BeizamazaoController::class, 'show'])->name('beizamazaos.show');
});

Route::get('dashboard', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'indexfront'])->name('homepage');


Route::get('chat', [App\Http\Controllers\Message\MessageController::class, 'index'])->name('chat.index');
Route::post('chat/send-message', [App\Http\Controllers\Message\MessageController::class, 'sendMessage'])->name('chat.send-message');

require __DIR__ . '/auth.php';
