<?php

namespace App\Controllers;

/**
 * Teacher Controller
 * Task 3: Role-specific controller for teachers
 */
class Teacher extends BaseController
{
    /**
     * Teacher Dashboard
     * Task 3: Display teacher dashboard
     */
    public function dashboard()
    {
        // Task 3: Load teacher dashboard view
        return view('teacher/teacher_dashboard');
    }
}

