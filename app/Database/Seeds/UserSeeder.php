<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * User Seeder
 * Creates sample users for testing
 */
class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Admin User',
                'email' => 'admin@rmmc.edu.ph',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Teacher User',
                'email' => 'teacher@rmmc.edu.ph',
                'password' => password_hash('teacher123', PASSWORD_DEFAULT),
                'role' => 'teacher',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Student User',
                'email' => 'student@rmmc.edu.ph',
                'password' => password_hash('student123', PASSWORD_DEFAULT),
                'role' => 'student',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'John Doe',
                'email' => 'john.doe@rmmc.edu.ph',
                'password' => password_hash('password123', PASSWORD_DEFAULT),
                'role' => 'student',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data
        foreach ($data as $user) {
            $this->db->table('users')->insert($user);
        }
    }
}

