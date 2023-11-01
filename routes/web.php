<?php

use App\Http\Controllers\AdminController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [AdminController::class, 'welcome']);

// Route::get('/', function () {
//     return Inertia::render('Welcome', [

//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//         $name = Auth::user()->name,
//         'name' => $name
//     ]);
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        // Dashboard
        Route::middleware('role:master|service|financial|marketing|organizer|influencer')
            ->group(function () {
                Route::get('/dashboard2', [AdminController::class, 'dashboard'])
                    ->middleware('permission:view dashboard')
                    ->name('dashboard2');
            });

        // Orders
        Route::middleware('role:master|service|financial|organizer')
            ->group(function () {
                Route::get('/orders', [AdminController::class, 'orders'])
                    ->middleware('permission:view orders')
                    ->name('orders');
            });

        // Customers
        Route::middleware('role:master|service|financial|organizer')
            ->group(function () {
                Route::get('/customers', [AdminController::class, 'customers'])
                    ->middleware('permission:view customers')
                    ->name('customers');
            });

        // Finances
        Route::middleware('role:master|financial|influencer')
            ->group(function () {
                Route::get('/finances', [AdminController::class, 'finances'])
                    ->middleware('permission:view finances')
                    ->name('finances');
            });

        // Users
        Route::middleware('role:master|financial|marketing')
            ->group(function () {
                Route::get('/users', [AdminController::class, 'users'])
                    ->middleware('permission:view users')
                    ->name('users');
            });

        // Events
        Route::middleware('role:master|marketing|organizer')
            ->group(function () {
                Route::get('/events', [AdminController::class, 'events'])
                    ->middleware('permission:view events')
                    ->name('events');
            });

        // Coupons
        Route::middleware('role:master|marketing|organizer|influencer')
            ->group(function () {
                Route::get('/coupons', [AdminController::class, 'coupons'])
                    ->middleware('permission:view coupons')
                    ->name('coupons');
            });

        // Courtesy
        Route::middleware('role:master|marketing|organizer|influencer')
            ->group(function () {
                Route::get('/courtesy', [AdminController::class, 'courtesy'])
                    ->middleware('permission:view courtesy')
                    ->name('courtesy');
            });

        // Marketing
        Route::middleware('role:master|marketing|organizer')
            ->group(function () {
                Route::get('/marketing', [AdminController::class, 'marketing'])
                    ->middleware('permission:view marketing')
                    ->name('marketing');
            });

        // Marketing Schedule
        Route::middleware('role:master|service')
            ->group(function () {
                Route::get('/marketing-schedule', [AdminController::class, 'marketingSchedule'])
                    ->middleware('permission:view marketing schedule')
                    ->name('marketing-schedule');
            });

        // Partnerships
        Route::middleware('role:master|influencer')
            ->group(function () {
                Route::get('/partnerships', [AdminController::class, 'partnerships'])
                    ->middleware('permission:view partnerships')
                    ->name('partnerships');
            });

        // Graphic Materials
        Route::middleware('role:master|influencer')
            ->group(function () {
                Route::get('/graphic-materials', [AdminController::class, 'graphicMaterials'])
                    ->middleware('permission:view graphic materials')
                    ->name('graphic-materials');
            });

        // Drafts
        Route::middleware('role:master|athlete')
            ->group(function () {
                Route::get('/drafts', [AdminController::class, 'drafts'])
                    ->middleware('permission:view drafts')
                    ->name('drafts');
            });

        // My Orders
        Route::middleware('role:master|athlete')
            ->group(function () {
                Route::get('/my-orders', [AdminController::class, 'myOrders'])
                    ->middleware('permission:view my orders')
                    ->name('my-orders');
            });

        // My Account
        Route::middleware('role:master|athlete')
            ->group(function () {
                Route::get('/my-account', [AdminController::class, 'myAccount'])
                    ->middleware('permission:view my account')
                    ->name('my-account');
            });
    });
});
