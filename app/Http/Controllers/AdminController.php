<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function welcome()
    {
        $canLogin = Route::has('login');
        $canRegister = Route::has('register');
        $user = Auth::user();
        $name = $user ? $user->name : '';
        $permissions = $user ? $user->getAllPermissions()->pluck('name') : collect();
        return Inertia::render('Welcome', [
            'canLogin' => $canLogin,
            'canRegister' => $canRegister,
            'name' => $name,
            'permissions' => $permissions
        ]);
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard2');
    }
    public function orders()
    {
        return Inertia::render('Orders');
    }

    public function finances()
    {
        return Inertia::render('Finances');
    }

    public function customers()
    {
        return Inertia::render('Customers');
    }

    public function marketingSchedule()
    {
        return Inertia::render('MarketingSchedule');
    }

    public function users()
    {
        return Inertia::render('Users');
    }

    public function events()
    {
        return Inertia::render('Events');
    }

    public function coupons()
    {
        return Inertia::render('Coupons');
    }

    public function courtesy()
    {
        return Inertia::render('Courtesy');
    }

    public function marketing()
    {
        return Inertia::render('Marketing');
    }

    public function partnerships()
    {
        return Inertia::render('Partnerships');
    }

    public function graphicMaterials()
    {
        return Inertia::render('GraphicMaterials');
    }

    public function drafts()
    {
        return Inertia::render('Drafts');
    }

    public function myOrders()
    {
        return Inertia::render('MyOrders');
    }

    public function myAccount()
    {
        return Inertia::render('MyAccount');
    }
}
