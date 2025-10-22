<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Task 2: Announcement Seeder
 * Inserts sample announcements into the database
 */
class AnnouncementSeeder extends Seeder
{
    /**
     * Task 2: Insert at least two sample announcements
     */
    public function run()
    {
        // Task 2: Sample announcement data
        $data = [
            [
                'title' => 'Welcome to Online Student Portal',
                'content' => 'We are excited to announce the launch of our new Online Student Portal! This platform provides a comprehensive digital experience for students, teachers, and administrators. Students can view announcements, check grades, and access course materials. Teachers can manage their classes and communicate with students. Administrators have full control over the system. Please explore the features and let us know if you have any questions or feedback.',
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
            ],
            [
                'title' => 'Midterm Examination Schedule',
                'content' => 'The Midterm Examinations for First Semester AY 2025-2026 will be held from October 25 to October 29, 2025. Students are required to check their examination schedules through the portal. Please ensure you are prepared for your exams. Good luck to all students! For any concerns regarding the examination schedule, please contact the registrar\'s office.',
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
            [
                'title' => 'System Maintenance Notice',
                'content' => 'The Online Student Portal will undergo scheduled maintenance on October 30, 2025, from 12:00 AM to 4:00 AM. During this time, the system will be temporarily unavailable. We apologize for any inconvenience this may cause. The maintenance is necessary to improve system performance and add new features. Thank you for your patience and understanding.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'New Library Resources Available',
                'content' => 'The university library is pleased to announce that we have added over 500 new digital resources including e-books, journals, and research papers. These resources cover various disciplines and are accessible to all students and faculty members through the library portal. Access credentials are the same as your student portal login. Happy reading and researching!',
                'created_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
            ],
        ];

        // Task 2: Insert announcements into the database
        foreach ($data as $announcement) {
            $this->db->table('announcements')->insert($announcement);
        }
    }
}

