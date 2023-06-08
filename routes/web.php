<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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
});

Route::get('/dashboard', function () {
    $users = Auth::user()->members()->orderBy('lastName')->paginate(6);
    return view('dashboard', ['users' => $users]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('members/create', [MemberController::class, 'create'])->name('member.create');
Route::post('members/', [MemberController::class, 'store'])->name('member.store');
Route::get('members/{member}/edit', [MemberController::class, 'edit'])->name('member.edit');
Route::put('members/{member}', [MemberController::class, 'update'])->name('member.update');
Route::delete('members/{member}', [MemberController::class, 'destroy'])->name('member.destroy');
Route::get('members/export', [MemberController::class, 'export'])->name('member.export');

Route::post('images', [ImageController::class, 'store'])->name('image.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
