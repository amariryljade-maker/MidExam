<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    /**
     * Display the login page
     */
    public function login()
    {
        // If already logged in, redirect based on role
        if (session()->has('logged_in')) {
            return $this->redirectBasedOnRole();
        }

        return view('auth/login');
    }

    /**
     * Process login form submission
     */
    public function loginProcess()
    {
        $validation = \Config\Services::validation();

        // Validation rules
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Find user by email
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            $sessionData = [
                'user_id' => $user['id'],
                'email' => $user['email'],
                'name' => $user['name'],
                'role' => $user['role'],
                'logged_in' => true
            ];
            session()->set($sessionData);

            // Redirect based on role (Task 3 requirement)
            return $this->redirectBasedOnRole();
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password');
        }
    }

    /**
     * Display the registration page
     */
    public function register()
    {
        return view('auth/register');
    }

    /**
     * Process registration form submission
     */
    public function registerProcess()
    {
        $validation = \Config\Services::validation();

        // Validation rules
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
            'role' => 'required|in_list[student,teacher,admin]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $userModel = new UserModel();

        // Prepare user data
        $userData = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role')
        ];

        if ($userModel->insert($userData)) {
            return redirect()->to('/login')->with('success', 'Registration successful! Please login.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Registration failed. Please try again.');
        }
    }

    /**
     * Logout user
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out successfully.');
    }

    /**
     * Redirect user based on their role (Task 3 requirement)
     */
    private function redirectBasedOnRole()
    {
        $role = session()->get('role');

        switch ($role) {
            case 'admin':
                return redirect()->to('/admin/dashboard');
            case 'teacher':
                return redirect()->to('/teacher/dashboard');
            case 'student':
                return redirect()->to('/announcements');
            default:
                return redirect()->to('/announcements');
        }
    }
}

