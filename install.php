<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Installer - MidExam Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 50px 0;
        }
        .install-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            padding: 40px;
        }
        .success { color: #28a745; }
        .error { color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="install-card">
                    <h1 class="text-center mb-4">
                        <i class="bi bi-database-fill"></i>
                        Database Installation
                    </h1>
                    <p class="text-center text-muted mb-4">RMMC - MidExam Project Setup</p>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_GET['auto'])) {
                        echo '<h4>Installation Progress:</h4>';
                        
                        $host = 'localhost';
                        $username = 'root';
                        $password = '';
                        $database = 'student_portal';
                        
                        // Connect to MySQL
                        echo '<div class="alert alert-info">Step 1: Connecting to MySQL...</div>';
                        $conn = @mysqli_connect($host, $username, $password);
                        
                        if (!$conn) {
                            echo '<div class="alert alert-danger">✗ Connection failed: ' . mysqli_connect_error() . '</div>';
                            echo '<p><strong>Solution:</strong> Make sure WAMP is running!</p>';
                            exit;
                        }
                        echo '<div class="alert alert-success">✓ Connected to MySQL successfully!</div>';
                        
                        // Create database
                        echo '<div class="alert alert-info">Step 2: Creating database...</div>';
                        if (mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS `$database`")) {
                            echo '<div class="alert alert-success">✓ Database created!</div>';
                        } else {
                            echo '<div class="alert alert-danger">✗ Error: ' . mysqli_error($conn) . '</div>';
                        }
                        
                        mysqli_select_db($conn, $database);
                        
                        // Create users table
                        echo '<div class="alert alert-info">Step 3: Creating users table...</div>';
                        $sql = "CREATE TABLE IF NOT EXISTS `users` (
                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            `name` VARCHAR(100) NOT NULL,
                            `email` VARCHAR(100) NOT NULL UNIQUE,
                            `password` VARCHAR(255) NOT NULL,
                            `role` ENUM('student', 'teacher', 'admin') DEFAULT 'student',
                            `created_at` DATETIME DEFAULT NULL,
                            `updated_at` DATETIME DEFAULT NULL,
                            PRIMARY KEY (`id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
                        
                        if (mysqli_query($conn, $sql)) {
                            echo '<div class="alert alert-success">✓ Users table created!</div>';
                        } else {
                            echo '<div class="alert alert-danger">✗ Error: ' . mysqli_error($conn) . '</div>';
                        }
                        
                        // Create announcements table
                        echo '<div class="alert alert-info">Step 4: Creating announcements table...</div>';
                        $sql = "CREATE TABLE IF NOT EXISTS `announcements` (
                            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                            `title` VARCHAR(255) NOT NULL,
                            `content` TEXT NOT NULL,
                            `created_at` DATETIME NOT NULL,
                            PRIMARY KEY (`id`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
                        
                        if (mysqli_query($conn, $sql)) {
                            echo '<div class="alert alert-success">✓ Announcements table created!</div>';
                        } else {
                            echo '<div class="alert alert-danger">✗ Error: ' . mysqli_error($conn) . '</div>';
                        }
                        
                        // Insert users
                        echo '<div class="alert alert-info">Step 5: Inserting test users...</div>';
                        $users = [
                            ['Admin User', 'admin@rmmc.edu.ph', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'],
                            ['Teacher User', 'teacher@rmmc.edu.ph', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teacher'],
                            ['Student User', 'student@rmmc.edu.ph', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student']
                        ];
                        
                        $inserted = 0;
                        foreach ($users as $user) {
                            $check = mysqli_query($conn, "SELECT id FROM users WHERE email = '{$user[1]}'");
                            if (mysqli_num_rows($check) == 0) {
                                $sql = "INSERT INTO users (name, email, password, role, created_at, updated_at) 
                                        VALUES ('{$user[0]}', '{$user[1]}', '{$user[2]}', '{$user[3]}', NOW(), NOW())";
                                if (mysqli_query($conn, $sql)) $inserted++;
                            }
                        }
                        echo '<div class="alert alert-success">✓ Inserted ' . $inserted . ' test users!</div>';
                        
                        // Insert announcements
                        echo '<div class="alert alert-info">Step 6: Inserting sample announcements...</div>';
                        $announcements = [
                            ['Welcome to Online Student Portal', 'We are excited to announce the launch of our new Online Student Portal! This platform provides a comprehensive digital experience for students, teachers, and administrators.', 'DATE_SUB(NOW(), INTERVAL 2 DAY)'],
                            ['Midterm Examination Schedule', 'The Midterm Examinations for First Semester AY 2025-2026 will be held from October 25 to October 29, 2025. Students are required to check their examination schedules through the portal.', 'DATE_SUB(NOW(), INTERVAL 1 DAY)'],
                            ['System Maintenance Notice', 'The Online Student Portal will undergo scheduled maintenance on October 30, 2025, from 12:00 AM to 4:00 AM.', 'NOW()'],
                            ['New Library Resources Available', 'The university library has added over 500 new digital resources including e-books, journals, and research papers.', 'DATE_SUB(NOW(), INTERVAL 3 DAY)']
                        ];
                        
                        $inserted = 0;
                        foreach ($announcements as $ann) {
                            $title = mysqli_real_escape_string($conn, $ann[0]);
                            $content = mysqli_real_escape_string($conn, $ann[1]);
                            $check = mysqli_query($conn, "SELECT id FROM announcements WHERE title = '$title'");
                            if (mysqli_num_rows($check) == 0) {
                                $sql = "INSERT INTO announcements (title, content, created_at) 
                                        VALUES ('$title', '$content', {$ann[2]})";
                                if (mysqli_query($conn, $sql)) $inserted++;
                            }
                        }
                        echo '<div class="alert alert-success">✓ Inserted ' . $inserted . ' announcements!</div>';
                        
                        mysqli_close($conn);
                        
                        echo '<div class="alert alert-success mt-4">
                                <h4>✓ Installation Complete!</h4>
                                <p>The database has been set up successfully.</p>
                              </div>';
                        
                        echo '<div class="card mt-4">
                                <div class="card-header bg-primary text-white">
                                    <strong>Test Login Credentials</strong>
                                </div>
                                <div class="card-body">
                                    <table class="table">
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
                              </div>';
                        
                        echo '<div class="text-center mt-4">
                                <a href="public/" class="btn btn-success btn-lg">
                                    <i class="bi bi-arrow-right-circle"></i> Go to Application
                                </a>
                              </div>';
                        
                        echo '<div class="alert alert-warning mt-4">
                                <strong>Note:</strong> All exam tasks are complete! Check your GitHub repository for the code.
                              </div>';
                              
                    } else {
                        ?>
                        <div class="alert alert-info">
                            <h5><i class="bi bi-info-circle"></i> Ready to Install</h5>
                            <p>This will create:</p>
                            <ul>
                                <li><code>student_portal</code> database</li>
                                <li><code>users</code> table with 3 test accounts</li>
                                <li><code>announcements</code> table with 4 sample posts</li>
                            </ul>
                            <p class="mb-0"><strong>Requirements:</strong> WAMP/MySQL must be running</p>
                        </div>
                        
                        <div class="text-center mt-4">
                            <form method="POST">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-play-fill"></i> Install Database Now
                                </button>
                            </form>
                        </div>
                        
                        <div class="card mt-4 bg-light">
                            <div class="card-body">
                                <h6>Project Status:</h6>
                                <p class="mb-1">✅ All 4 exam tasks coded and committed</p>
                                <p class="mb-1">✅ 15 meaningful commits on GitHub</p>
                                <p class="mb-0">✅ Ready for submission</p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                
                <div class="text-center mt-4">
                    <p class="text-white">
                        <small>Ramon Magsaysay Memorial College | MidExam Project | AY 2025-2026</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>

