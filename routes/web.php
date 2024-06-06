<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\DebugeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', [WebController::class, 'home']);

Route::get('/debuge', [DebugeController::class, 'index']);

Route::get('/search-kelurahan', [VillageController::class, 'searchKelurahan']);

Route::post('web/orders', [WebController::class, 'store'])->name('store');

Route::get('/tracking', [WebController::class, 'tracking'])->name('tracking');

Route::post('/tracking', [WebController::class, 'postTracking'])->name('postTracking');



Route::middleware(['auth:admin'])->group(function () {

    // Menampilkan semua pelanggan
    // Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');


    // Menampilkan formulir untuk membuat pelanggan baru
    Route::get('/customers/create', [CustomerController::class, 'create']);

    // Menyimpan pelanggan baru
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('store.customer');

    // Menampilkan formulir untuk mengedit pelanggan dengan ID tertentu
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('edit.customer');

    // Menyimpan perubahan pada pelanggan dengan ID tertentu
    Route::put('/customers/{id}/update', [CustomerController::class, 'update'])->name('update.customer');

    // Menghapus pelanggan dengan ID tertentu
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('destroy.customer');


    // Menampilkan semua armada
    // Route::get('/armada', [ArmadaController::class, 'index']);
    Route::get('/armada', [ArmadaController::class, 'index'])->name('armada.index');


    // Menampilkan formulir untuk membuat armada baru
    Route::get('/armada/create', [ArmadaController::class, 'create']);

    // Menyimpan armada baru
    Route::post('/armada/store', [ArmadaController::class, 'store'])->name('store.armada');

    // Menampilkan formulir untuk mengedit armada dengan ID tertentu
    Route::get('/armada/{id}/edit', [ArmadaController::class, 'edit'])->name('edit.armada');

    // Menyimpan perubahan pada armada dengan ID tertentu
    Route::put('/armada/{id}/update', [ArmadaController::class, 'update'])->name('update.armada');

    // Menghapus armada dengan ID tertentu
    Route::delete('/armada/{id}', [ArmadaController::class, 'destroy'])->name('destroy.armada');



    // Menampilkan semua orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    // Menampilkan formulir untuk membuat order baru
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');

    // Menyimpan order baru
    Route::post('/orders/store', [OrderController::class, 'store'])->name('store.order');

    // Menampilkan formulir untuk mengedit order dengan ID tertentu
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('edit.order');

    // Menyimpan perubahan pada order dengan ID tertentu
    Route::put('/orders/{id}/update', [OrderController::class, 'update'])->name('update.order');

    // Menghapus order dengan ID tertentu
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('destroy.order');

    // Change this line:
    Route::put('/orders/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    // to use a parameter for the order ID:
    Route::put('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    // ini paling bawah ya nnati di anggep cerate
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.updateStatus');

    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');

    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
    // Route::put('/orders/{id}', 'OrderController@update')->name('orders.update');



    // Rute untuk Role
    Route::get('role', [RoleController::class, 'index'])->name('role.index');
    Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('role', [RoleController::class, 'store'])->name('role.store');
    Route::get('role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('role/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
    Route::get('role/{id}', [RoleController::class, 'show'])->name('role.show');


    // Rute untuk Menu
    Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/{id}', [MenuController::class, 'show'])->name('menu.show');
    Route::get('menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
    Route::get('menu/search', [MenuController::class, 'search'])->name('menu.search');


    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__ . '/adminauth.php';
