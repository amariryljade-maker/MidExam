<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Default route
$routes->get('/', 'Auth::login');

// Authentication routes
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::loginProcess');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::registerProcess');
$routes->get('logout', 'Auth::logout');

// Announcements route (accessible to all logged-in users)
$routes->get('announcements', 'Announcement::index', ['filter' => 'auth']);

// Admin routes - protected by RoleAuth filter
$routes->group('admin', ['filter' => 'roleauth'], static function ($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
});

// Teacher routes - protected by RoleAuth filter
$routes->group('teacher', ['filter' => 'roleauth'], static function ($routes) {
    $routes->get('dashboard', 'Teacher::dashboard');
});

// Student routes - protected by RoleAuth filter
$routes->group('student', ['filter' => 'roleauth'], static function ($routes) {
    $routes->get('dashboard', 'Student::dashboard');
});
