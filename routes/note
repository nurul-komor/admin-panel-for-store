<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AdminController;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*******************************************
 ********     Main Route    ***********
 ********************************************/

// ******* common prefix "dashboard" use as group ***** //
Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->group(function () {
    /*******************************************
     ********     Welcome Page    *********
     ********************************************/
    Route::get('/', function () {
        $title = "dashboard";
        $data = compact('title');
        return view('home')->with($data);
    })->name('home');

    /*******************************************
     ********     CustomerController    *********
     ********************************************/

    Route::resource('/customers', CustomerController::class);

    /*******************************************
     ********     BrandController    ************
     ********************************************/

    Route::resource('/brands', BrandController::class);
    Route::prefix('/brand')->name('brand.')->group(function () {
        Route::get('/trashes', [BrandController::class, 'trash'])->name('trashes');
        Route::get('/restore/{brand}', [BrandController::class, 'restoreBrand'])->name('restore');
        Route::get('/forceDelete/{brand}', [BrandController::class, 'forceDelete'])->name('forceDelete');
    });
    /*******************************************
     ********     ProductController    **********
     ********************************************/
    Route::resource('/products', ProductController::class);
    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('/trashes', [ProductController::class, 'trash'])->name('trashes');
        Route::get('/restore/{product}', [ProductController::class, 'restoreProduct'])->name('restore');
        Route::get('/forceDelete/{product}', [ProductController::class, 'forceDelete'])->name('forceDelete');
    });
    /*******************************************
     ********     PaymentTypeController    ******
     ********************************************/

    Route::resource('/payments', PaymentTypeController::class);

    /*******************************************
     ********     PurchaseController    **********
     ********************************************/

    Route::resource('/purchases', PurchaseController::class);

    /*******************************************
     ********     SalesController    ************
     ********************************************/

    Route::resource('/sales', SalesController::class);

    /*******************************************
     ********     SalesmanController    *********
     ********************************************/

    Route::resource('/salesman', SalesmanController::class);

    /*******************************************
     ********     SupplierController    *********
     ********************************************/

    Route::resource('/suppliers', SupplierController::class);

    /*******************************************
     ********     SupplierController    *********
     ********************************************/
    Route::resource('/admins', SupplierController::class);
});


// Github account
Route::get('github', function () {
    return redirect()->away('https://www.github.com');
});

require __DIR__ . '/auth.php';
