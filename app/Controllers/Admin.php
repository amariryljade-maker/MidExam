<?php

namespace App\Controllers;

/**
 * Admin Controller
 * Task 3: Role-specific controller for administrators
 */
class Admin extends BaseController
{
    /**
     * Admin Dashboard
     * Task 3: Display admin dashboard
     */
    public function dashboard()
    {
        // Task 3: Load admin dashboard view
        return view('admin/admin_dashboard');
    }
}

