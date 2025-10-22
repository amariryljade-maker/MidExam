<?php

namespace App\Controllers;

/**
 * Student Controller
 * Additional controller for student-specific features
 */
class Student extends BaseController
{
    /**
     * Student Dashboard
     */
    public function dashboard()
    {
        return view('student/student_dashboard');
    }
}

