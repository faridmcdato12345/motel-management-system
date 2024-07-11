<?php

use App\Models\User;
use Inertia\Inertia;
use App\Models\Motel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\MotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\GuestTypeController;
use App\Http\Controllers\AddMotelUserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/motel',MotelController::class)->except('create','edit');
    Route::resource('/guest_type',GuestTypeController::class);
    Route::resource('/room_type', RoomTypeController::class);

    Route::post('/add_motel_user/{motel}', [AddMotelUserController::class,'store'])->name('store.motel.user');
    Route::resource('/users',UserController::class)->except('create','edit','show','update');
    Route::get('/users/{id}', [UserController::class,'show'])->name('users.show');
    Route::patch('/users/{user}/{motel}',[UserController::class,'update'])->name('users.update');

    Route::resource('/guest', GuestController::class)->except('create','edit');

    Route::resource('/rates', RateController::class)->except('create','edit');
    Route::resource('/rooms', RoomController::class)->except('create','edit');
});

Route::get('/test',function() {
    $user = User::create(['name' => 'new testss', 'email' => 'email@testss.com', 'password' => Hash::make('password')]);
    $motel = Motel::find(1);
    $user->motels()->attach($motel->id);
    return $user->id;
});

require __DIR__.'/auth.php';
