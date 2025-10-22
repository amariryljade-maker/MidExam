<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Auth Filter
 * Basic authentication filter to check if user is logged in
 */
class Auth implements FilterInterface
{
    /**
     * Check if user is logged in
     *
     * @param RequestInterface $request
     * @param array|null $arguments
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Check if user is logged in
        if (!session()->has('logged_in')) {
            // User is not logged in, redirect to login page
            return redirect()->to('/login')->with('error', 'Please login to access this page.');
        }
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

