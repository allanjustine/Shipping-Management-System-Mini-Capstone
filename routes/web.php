<?php

use App\Http\Controllers\NormalView\IndexController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ShipController;
use App\Http\Controllers\Auth\AuthIndexController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\TestEnrollmentController;
use App\Http\Controllers\PageController;
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
Route::get('/services', [PageController::class, 'service']);
Route::get('/contact-us', [PageController::class, 'contact']);
Route::put('/contact-us', [PageController::class, 'sendFeedback'])->name('feedback');
Route::get('/', [IndexController::class, 'shipList']);
Route::get('/results/search', [IndexController::class, 'searchShip'])->name('search');

Route::get('/login', [AuthIndexController::class, 'loginPage']);
Route::post('/login', [AuthIndexController::class, 'login'])->name('login');

Route::get('/register', [AuthIndexController::class, 'registerPage']);
Route::put('/register', [AuthIndexController::class, 'register'])->name('register');
Route::get('/verification/{user}/{token}', [AuthIndexController::class, 'verification']);

Route::get('/category/{category}', [IndexController::class, 'categoryList']);


Route::get('/logout', [AuthIndexController::class, 'logout']);

Route::middleware(['auth', 'verified'])->group(function () {

    //admin permission route
    Route::middleware('can:manage-all')->group(function () {
        Route::get('/admin/dashboard', [AdminIndexController::class, 'adminDashboard']);

        Route::get('/admin/users/result/search', [AdminPageController::class, 'search'])->name('admin.users.search');

        Route::get('/admin/users', [AdminPageController::class, 'userList']);
        Route::get('/admin/users/create', [AdminPageController::class, 'createUser']);
        Route::put('/admin/users/create', [AdminPageController::class, 'create'])->name('admin.user.create');
        Route::get('/admin/users/update/{user}', [AdminPageController::class, 'updateUser']);
        Route::put('/admin/users/update/{user}', [AdminPageController::class, 'update'])->name('admin.user.update');
        Route::delete('/admin/users/{user}', [AdminPageController::class, 'delete'])->name('admin.user.delete');

        Route::get('/admin/logs', [LogController::class, 'index'])->name('logs.index');

        Route::get('/admin/feedbacks', [AdminIndexController::class, 'contacts']);

        Route::get('/admin/categories', [CategoryController::class, 'categories']);
        Route::get('/admin/categories/create', [CategoryController::class, 'createCategory']);
        Route::put('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::get('/admin/categories/update/{category}', [CategoryController::class, 'updateCategory']);
        Route::put('/admin/categories/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/admin/categories/{category}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('/admin/categories/result/search', [CategoryController::class, 'searchCategory'])->name('admin.category.search');

        Route::get('/admin/ships', [ShipController::class, 'index']);
        Route::get('/admin/ships/create', [ShipController::class, 'createShip']);
        Route::put('/admin/ships/create', [ShipController::class, 'store'])->name('admin.ships.create');
        Route::get('/admin/ships/update/{ship}', [ShipController::class, 'updateShip']);
        Route::put('/admin/ships/update/{ship}', [ShipController::class, 'update'])->name('admin.ships.update');
        Route::delete('/admin/ships/{ship}', [ShipController::class, 'delete'])->name('admin.ships.delete');
        Route::get('/admin/ships/result/search', [ShipController::class, 'searchShip'])->name('admin.ships.search');

        Route::get('/admin/tickets', [TicketController::class, 'index']);
        Route::get('/admin/tickets/create', [TicketController::class, 'createTicket']);
        Route::put('/admin/tickets/create', [TicketController::class, 'createNow'])->name('admin.tickets.create');
        Route::get('/admin/tickets/update/{ticket}', [TicketController::class, 'updateTicket']);
        Route::put('/admin/tickets/update/{ticket}', [TicketController::class, 'update'])->name('admin.tickets.update');
        Route::put('/admin/tickets/{ticket}', [TicketController::class, 'marked'])->name('admin.tickets.mark');
        Route::get('/admin/tickets/result/search', [TicketController::class, 'searchTicket'])->name('admin.tickets.search');

    });

    //user permission route
    Route::middleware('can:customer')->group(function () {
        Route::get('/tickets', [IndexController::class, 'tickets']);
        Route::get('/confirm-ticket/{ship}', [IndexController::class, 'confirmTicket']);
        Route::put('/confirm-ticket/{ship}', [IndexController::class, 'ticketCreate'])->name('create.ticket');
        Route::delete('/tickets/{ticket}', [IndexController::class, 'cancelled'])->name('tickets.cancel');
    });

    Route::get('/send-testenrollment', [TestEnrollmentController::class, 'sendTestNotification']);
});
Route::get('/sendmail', [EmailController::class, 'sendEmail']);
