<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * RoleAuth Filter
 * Task 4: Authorization filter to check user's role and restrict access based on routes
 */
class RoleAuth implements FilterInterface
{
    /**
     * Check user's role and authorize access to routes
     * Task 4: Implement role-based access control
     *
     * @param RequestInterface $request
     * @param array|null $arguments
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if user is logged in
        if (!session()->has('logged_in')) {
            return redirect()->to('/login')->with('error', 'Please login to access this page.');
        }

        // Get user's role from session
        $role = session()->get('role');
        
        // Get the current URI
        $uri = $request->getUri()->getPath();
        
        // Task 4: Role-based access control logic
        
        // Admin can access any route starting with /admin
        if (strpos($uri, '/admin') === 0 || strpos($uri, 'admin') !== false) {
            if ($role !== 'admin') {
                // Access denied: User is not an admin
                return redirect()->to('/announcements')
                    ->with('error', 'Access Denied: Insufficient Permissions');
            }
        }
        
        // Teacher can only access routes starting with /teacher
        if (strpos($uri, '/teacher') === 0 || strpos($uri, 'teacher') !== false) {
            if ($role !== 'teacher' && $role !== 'admin') {
                // Access denied: User is not a teacher or admin
                return redirect()->to('/announcements')
                    ->with('error', 'Access Denied: Insufficient Permissions');
            }
        }
        
        // Student can access routes starting with /student and /announcements
        if (strpos($uri, '/student') === 0 || strpos($uri, 'student') !== false) {
            if ($role !== 'student' && $role !== 'admin') {
                // Access denied: User is not a student or admin
                return redirect()->to('/announcements')
                    ->with('error', 'Access Denied: Insufficient Permissions');
            }
        }
        
        // Allow access if checks pass
        return;
    }

    /**
     * After filter
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @param array|null $arguments
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}

