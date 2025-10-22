<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

/**
 * Announcement Controller
 * Task 1: Manages the announcements module
 */
class Announcement extends BaseController
{
    /**
     * Display all announcements
     * Task 1 & Task 2: Fetch and display announcements ordered by newest first
     */
    public function index()
    {
        // Task 2: Use AnnouncementModel to fetch all announcements
        $announcementModel = new AnnouncementModel();
        
        // Task 2: Order by created_at in descending order (newest first)
        $data['announcements'] = $announcementModel->orderBy('created_at', 'DESC')->findAll();
        
        // Task 1: Pass data to the announcements view
        return view('announcements', $data);
    }
}

