<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

/**
 * route for admin
 */

//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function() {

        //route dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        //route resource categories
        Route::resource('/category', CategoryController::class,['as' => 'admin']);
        //route resource campaign
        Route::resource('/campaign', CampaignController::class, ['as' => 'admin']);
        //route donatur
        Route::get('/donatur', [DonaturController::class, 'index'])->name('admin.donatur.index');
        //route donation
        Route::get('/donation', [DonationController::class, 'index'])->name('admin.donation.index');
        Route::get('/donation/filter', [DonationController::class, 'filter'])->name('admin.donation.firter');
        //route profile
        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
        //route resource slider
        Route::resource('/slider', SliderController::class, ['except' => ['show', 'create', 'edit', 'update'], 'as' => 'admin']);


    });
});
