<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleMenu;
use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the authenticated user is an admin
            if (Auth::user()->isAdmin()) { // Misalkan Anda memiliki metode isAdmin() di model User
                // Redirect admin users to the admin dashboard route
                return redirect()->route('admin.dashboard');
            } else {
                // For non-admin users, handle the logic to retrieve menus and submenus
                $menuItemsWithSubmenus = []; // Your logic to retrieve menus and submenus goes here

                // Pass the $menuItemsWithSubmenus variable to the view
                return view('dashboard.index', compact('menuItemsWithSubmenus'));
            }
        } else {
            // If the user is not authenticated, redirect to the login page
            return redirect()->route('login');
        }
    }
}

