<?php
/**
 * Quick Setup Script for MidExam Project
 * Run this file in your browser: http://localhost/MIdExam/setup.php
 */

// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'student_portal';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MidExam Project Setup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 50px 0;
        }
        .setup-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            padding: 40px;
        }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .step {
            padding: 15px;
            margin: 10px 0;
            border-left: 4px solid #667eea;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="setup-card">
                    <h1 class="text-center mb-4">
                        <i class="bi bi-gear-fill"></i>
                        MidExam Project Setup
                    </h1>
                    <p class="text-center text-muted mb-4">Ramon Magsaysay Memorial College</p>

                    <?php if (!isset($_GET['run'])): ?>
                        <div class="alert alert-info">
                            <h5><i class="bi bi-info-circle"></i> Ready to Setup</h5>
                            <p>This script will:</p>
                            <ul>
                                <li>Create the <code>student_portal</code> database</li>
                                <li>Create required tables (users and announcements)</li>
                                <li>Insert sample data (test users and announcements)</li>
                            </ul>
                            <p class="mb-0"><strong>Note:</strong> Make sure your WAMP/MySQL server is running!</p>
                        </div>

                        <div class="text-center mt-4">
                            <a href="?run=true" class="btn btn-primary btn-lg">
                                <i class="bi bi-play-fill"></i> Run Setup Now
                            </a>
                        </div>

                    <?php else: ?>
                        <h4 class="mb-4">Setup Progress:</h4>

                        <?php
                        // Step 1: Connect to MySQL
                        echo '<div class="step">';
                        echo '<strong>Step 1:</strong> Connecting to MySQL...<br>';
                        $conn = @mysqli_connect($host, $username, $password);
                        if (!$conn) {
                            echo '<span class="error">✗ Failed: ' . mysqli_connect_error() . '</span>';
                            echo '<br><br><strong>Solution:</strong> Make sure WAMP is running and MySQL credentials are correct.';
                            echo '</div></div></div></body></html>';
                            exit;
                        }
                        echo '<span class="success">✓ Connected successfully</span>';
                        echo '</div>';

                        // Step 2: Create Database
                        echo '<div class="step">';
                        echo '<strong>Step 2:</strong> Creating database <code>student_portal</code>...<br>';
                        $sql = "CREATE DATABASE IF NOT EXISTS `$database`";
                        if (mysqli_query($conn, $sql)) {
                            echo '<span class="success">✓ Database created/verified</span>';
                        } else {
                            echo '<span class="error">✗ Error: ' . mysqli_error($conn) . '</span>';
                        }
                        echo '</div>';

                        // Select the database
                        mysqli_select_db($conn, $database);

                        // Step 3: Create users table
                        echo '<div class="step">';
                        echo '<strong>Step 3:</strong> Creating <code>users</code> table...<br>';
                        $sql = "CREATE TABLE IF NOT EXISTS `users` (
                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            `name` VARCHAR(100) NOT NULL,
                            `email` VARCHAR(100) NOT NULL UNIQUE,
                            `password` VARCHAR(255) NOT NULL,
                            `role` ENUM('student', 'teacher', 'admin') DEFAULT 'student',
                            `created_at` DATETIME DEFAULT NULL,
                            `updated_at` DATETIME DEFAULT NULL,
                            PRIMARY KEY (`id`),
                            INDEX `idx_email` (`email`),
                            INDEX `idx_role` (`role`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
                        
                        if (mysqli_query($conn, $sql)) {
                            echo '<span class="success">✓ Users table created</span>';
                        } else {
                            echo '<span class="error">✗ Error: ' . mysqli_error($conn) . '</span>';
                        }
                        echo '</div>';

                        // Step 4: Create announcements table
                        echo '<div class="step">';
                        echo '<strong>Step 4:</strong> Creating <code>announcements</code> table...<br>';
                        $sql = "CREATE TABLE IF NOT EXISTS `announcements` (
                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            `title` VARCHAR(255) NOT NULL,
                            `content` TEXT NOT NULL,
                            `created_at` DATETIME NOT NULL,
                            PRIMARY KEY (`id`),
                            INDEX `idx_created_at` (`created_at`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
                        
                        if (mysqli_query($conn, $sql)) {
                            echo '<span class="success">✓ Announcements table created</span>';
                        } else {
                            echo '<span class="error">✗ Error: ' . mysqli_error($conn) . '</span>';
                        }
                        echo '</div>';

                        // Step 5: Insert sample users
                        echo '<div class="step">';
                        echo '<strong>Step 5:</strong> Inserting test user accounts...<br>';
                        
                        $users = [
                            ['Admin User', 'admin@rmmc.edu.ph', 'admin123', 'admin'],
                            ['Teacher User', 'teacher@rmmc.edu.ph', 'teacher123', 'teacher'],
                            ['Student User', 'student@rmmc.edu.ph', 'student123', 'student'],
                            ['John Doe', 'john.doe@rmmc.edu.ph', 'password123', 'student']
                        ];

                        $inserted = 0;
                        foreach ($users as $user) {
                            $name = mysqli_real_escape_string($conn, $user[0]);
                            $email = mysqli_real_escape_string($conn, $user[1]);
                            $password = password_hash($user[2], PASSWORD_DEFAULT);
                            $role = $user[3];
                            $now = date('Y-m-d H:i:s');
                            
                            $check = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");
                            if (mysqli_num_rows($check) == 0) {
                                $sql = "INSERT INTO users (name, email, password, role, created_at, updated_at) 
                                        VALUES ('$name', '$email', '$password', '$role', '$now', '$now')";
                                if (mysqli_query($conn, $sql)) {
                                    $inserted++;
                                }
                            }
                        }
                        echo '<span class="success">✓ Inserted ' . $inserted . ' test accounts</span>';
                        echo '</div>';

                        // Step 6: Insert sample announcements
                        echo '<div class="step">';
                        echo '<strong>Step 6:</strong> Inserting sample announcements...<br>';
                        
                        $announcements = [
                            [
                                'Welcome to Online Student Portal',
                                'We are excited to announce the launch of our new Online Student Portal! This platform provides a comprehensive digital experience for students, teachers, and administrators. Students can view announcements, check grades, and access course materials. Teachers can manage their classes and communicate with students. Administrators have full control over the system. Please explore the features and let us know if you have any questions or feedback.',
                                date('Y-m-d H:i:s', strtotime('-2 days'))
                            ],
                            [
                                'Midterm Examination Schedule',
                                'The Midterm Examinations for First Semester AY 2025-2026 will be held from October 25 to October 29, 2025. Students are required to check their examination schedules through the portal. Please ensure you are prepared for your exams. Good luck to all students! For any concerns regarding the examination schedule, please contact the registrar\'s office.',
                                date('Y-m-d H:i:s', strtotime('-1 day'))
                            ],
                            [
                                'System Maintenance Notice',
                                'The Online Student Portal will undergo scheduled maintenance on October 30, 2025, from 12:00 AM to 4:00 AM. During this time, the system will be temporarily unavailable. We apologize for any inconvenience this may cause. The maintenance is necessary to improve system performance and add new features. Thank you for your patience and understanding.',
                                date('Y-m-d H:i:s')
                            ],
                            [
                                'New Library Resources Available',
                                'The university library is pleased to announce that we have added over 500 new digital resources including e-books, journals, and research papers. These resources cover various disciplines and are accessible to all students and faculty members through the library portal. Access credentials are the same as your student portal login. Happy reading and researching!',
                                date('Y-m-d H:i:s', strtotime('-3 days'))
                            ]
                        ];

                        $inserted = 0;
                        foreach ($announcements as $ann) {
                            $title = mysqli_real_escape_string($conn, $ann[0]);
                            $content = mysqli_real_escape_string($conn, $ann[1]);
                            $created = $ann[2];
                            
                            $check = mysqli_query($conn, "SELECT id FROM announcements WHERE title = '$title'");
                            if (mysqli_num_rows($check) == 0) {
                                $sql = "INSERT INTO announcements (title, content, created_at) 
                                        VALUES ('$title', '$content', '$created')";
                                if (mysqli_query($conn, $sql)) {
                                    $inserted++;
                                }
                            }
                        }
                        echo '<span class="success">✓ Inserted ' . $inserted . ' announcements</span>';
                        echo '</div>';

                        mysqli_close($conn);
                        ?>

                        <div class="alert alert-success mt-4">
                            <h4><i class="bi bi-check-circle-fill"></i> Setup Complete!</h4>
                            <p>The database has been set up successfully. You can now use the application.</p>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header bg-primary text-white">
                                <strong>Test Login Credentials</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="badge bg-danger">Admin</span></td>
                                            <td>admin@rmmc.edu.ph</td>
                                            <td>admin123</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-info">Teacher</span></td>
                                            <td>teacher@rmmc.edu.ph</td>
                                            <td>teacher123</td>
                                        </tr>
                                        <tr>
                                            <td><span class="badge bg-primary">Student</span></td>
                                            <td>student@rmmc.edu.ph</td>
                                            <td>student123</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="public/index.php" class="btn btn-success btn-lg">
                                <i class="bi bi-arrow-right-circle"></i> Go to Application
                            </a>
                            <a href="setup.php" class="btn btn-secondary btn-lg">
                                <i class="bi bi-arrow-clockwise"></i> Run Setup Again
                            </a>
                        </div>

                        <div class="alert alert-warning mt-4">
                            <strong>Security Note:</strong> Delete this <code>setup.php</code> file after setup is complete for security purposes.
                        </div>
                    <?php endif; ?>

                </div>

                <div class="text-center mt-4">
                    <p class="text-white">
                        <small>Ramon Magsaysay Memorial College | Midterm Examination Project | AY 2025-2026</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>

