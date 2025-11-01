<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileDetailsController;
use App\Http\Controllers\ProfileEditDetailsController;
use App\Http\Controllers\CreateMenuController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MerchantTwoController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD & PROFILE ROUTES
    |--------------------------------------------------------------------------
    |
    | All dashboard and profile-related routes are defined here.
    | Each route handles specific actions like viewing, creating,
    | editing, updating, and deleting profile details.
    |
    */


    // ===============================
    // DASHBOARD ROUTE
    // ===============================
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ===============================
    // PROFILE MAIN PAGES
    // ===============================
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile-details', [ProfileDetailsController::class, 'index'])->name('profile-details');
    Route::get('/profile-edit', [ProfileEditDetailsController::class, 'index'])->name('edit-details');

    // ===============================
    // PROFILE DATA STORE (POST)
    // ===============================
    Route::post('/profile/save', [ProfileEditDetailsController::class, 'store'])->name('save');

    // ===============================
    // PROFILE ADD FORM PAGE
    // ===============================
    Route::get('/profile-add', function () {
        return view('pages.dashboard.profile-add');
    })->name('profile.add.form');

    // ===============================
    // PROFILE CRUD OPERATIONS (AJAX)
    // ===============================


    // Store new profile data
    Route::post('/profile/store', [ProfileEditDetailsController::class, 'store'])->name('profile.store');
    // Fetch all profile data
    Route::get('/profile/fetch', [ProfileEditDetailsController::class, 'fetch'])->name('profile.fetch');
    // Delete a specific profile record
    Route::delete('/profile/destroy/{id}', [ProfileEditDetailsController::class, 'destroy'])->name('profile.destroy');
    // Edit profile data by ID
    Route::get('/profile/edit/{id}', [ProfileEditDetailsController::class, 'edit'])->name('profile.edit');
    // Update profile data (PATCH)
    Route::patch('/profile/update/{id}', [ProfileEditDetailsController::class, 'update'])->name('profile.update');


    /*
    |--------------------------------------------------------------------------
    | MENUS Category ROUTES HERE
    |--------------------------------------------------------------------------
    |
    | Routes for managing menus:
    | view dashboard, store, fetch, edit, update, and delete using Laravel controller.
    |
    */

    // GET route for showing the Add form
    Route::get('/dashboard-menu', function () {
        return view('pages.dashboard.menu');
    })->name('dashboard.add.menu');

    Route::post('/menu/store', [CreateMenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/fetch', [CreateMenuController::class, 'fetch'])->name('menu.fetch');

    Route::delete('/menu/destroy/{id}', [CreateMenuController::class, 'destroy'])->name('menu.destroy');

    Route::get('/menu/edit/{id}', [CreateMenuController::class, 'edit'])->name('menu.edit');
    Route::patch('/menu/update/{id}', [CreateMenuController::class, 'update'])->name('menu.update');


    /*
    |--------------------------------------------------------------------------
    | MENUS SUB CATEGORY ROUTES HERE
    |--------------------------------------------------------------------------
    |
    | Routes for managing subcategories:
    | create, store, fetch, edit, update, and delete using Laravel controller.
    |
    */

    // GET route for showing the Add form
    Route::get('/dashboard-subcategory-menu', function () {
        return view('pages.dashboard.subcategory');
    })->name('dashboard.add.subcategory');

    Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/subcategory/fetch', [SubCategoryController::class, 'fetch'])->name('subcategory.fetch');

    Route::delete('/subcategory/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');

    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::patch('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');



    /*
    |--------------------------------------------------------------------------
    | CREATE NEW MENUS ROUTES HERE
    |--------------------------------------------------------------------------
    |
    | Routes for creating, listing, storing, and fetching
    | menus using MenuController in Laravel application.
    |
    */


    Route::get('/dashboard-create-menu', function () {
        return view('pages.dashboard.create-menu');
    })->name('dashboard.add.create-menu');

    Route::get('/menus/list', [MenuController::class, 'getMenus'])->name('menus.list');
    Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');


    Route::get('/menus/fetch', [MenuController::class, 'fetch'])->name('menus.fetch');

    /*
    |--------------------------------------------------------------------------
    | CREATE NEW MERCHANT ROUTES HERE
    |--------------------------------------------------------------------------
    |
    | Routes for creating, listing, storing, and fetching
    | merchant page using MerchantController in Laravel application.
    |
    */

    Route::get('/merchant/manage', [MerchantController::class, 'index'])->name('merchant.manage');
    Route::get('/merchant/fetch', [MerchantController::class, 'fetch'])->name('merchant.fetch');

    Route::delete('/merchant/delete/{id}', [MerchantController::class, 'destroy'])->name('merchant.delete');

    Route::post('/merchant/create', [MerchantController::class, 'create'])->name('merchant.create');
    Route::get('/merchant/edit/{id}', [MerchantController::class, 'edit'])->name('merchant.edit');
    Route::put('/merchant/update/{id}', [MerchantController::class, 'update'])->name('merchant.update');

    /*
    |--------------------------------------------------------------------------
    | CREATE NEW MERCHANT_2 ROUTES HERE
    |--------------------------------------------------------------------------
    |
    | Routes for creating, listing, storing, and fetching
    | merchant page using MerchantController in Laravel application.
    |
    */

    Route::get('/merchant-two/manage', [MerchantTwoController::class, 'index'])->name('merchant.manageTwo');
    Route::post('/merchant-two/create', [MerchantTwoController::class, 'create'])->name('merchant.createTwo');
    Route::get('/merchant-two/fetch', [MerchantTwoController::class, 'fetch'])->name('merchant.fetchTwo');
    Route::put('/merchant-two/update/{id}', [MerchantTwoController::class, 'update'])->name('merchant.updateTwo');
    Route::get('/merchant/edit/{id}', [MerchantTwoController::class, 'edit'])->name('merchant.edit');

});
