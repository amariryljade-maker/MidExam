<?php
// Fix Password Hashes for Test Accounts
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'student_portal';

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Fixing Passwords...</title>";
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>";
echo "<style>body{background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);min-height:100vh;padding:50px;}</style></head><body>";
echo "<div class='container'><div class='card p-5 shadow'>";
echo "<h2 class='text-center mb-4'>Fixing Password Hashes</h2>";

$conn = @mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "<div class='alert alert-danger'>Error: " . mysqli_connect_error() . "</div>";
    exit;
}

// Generate correct password hashes
$admin_hash = password_hash('admin123', PASSWORD_DEFAULT);
$teacher_hash = password_hash('teacher123', PASSWORD_DEFAULT);
$student_hash = password_hash('student123', PASSWORD_DEFAULT);

echo "<div class='alert alert-info'>Updating password hashes...</div>";

// Update passwords
$sql1 = "UPDATE users SET password = '$admin_hash' WHERE email = 'admin@rmmc.edu.ph'";
$sql2 = "UPDATE users SET password = '$teacher_hash' WHERE email = 'teacher@rmmc.edu.ph'";
$sql3 = "UPDATE users SET password = '$student_hash' WHERE email = 'student@rmmc.edu.ph'";

if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {
    echo "<div class='alert alert-success'><h4>✓ Passwords Fixed Successfully!</h4></div>";
} else {
    echo "<div class='alert alert-danger'>Error updating: " . mysqli_error($conn) . "</div>";
}

// Verify data
$result = mysqli_query($conn, "SELECT * FROM users");
echo "<h5 class='mt-4'>Verified User Accounts:</h5>";
echo "<table class='table table-bordered'><thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th></tr></thead><tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td><span class='badge bg-primary'>{$row['role']}</span></td></tr>";
}
echo "</tbody></table>";

// Check announcements
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM announcements");
$count = mysqli_fetch_assoc($result)['count'];
echo "<div class='alert alert-info'>Announcements in database: <strong>$count</strong></div>";

mysqli_close($conn);

echo "<div class='card mt-4 bg-light p-3'>";
echo "<h5>Test These Credentials:</h5>";
echo "<ul>";
echo "<li><strong>Admin:</strong> admin@rmmc.edu.ph / admin123</li>";
echo "<li><strong>Teacher:</strong> teacher@rmmc.edu.ph / teacher123</li>";
echo "<li><strong>Student:</strong> student@rmmc.edu.ph / student123</li>";
echo "</ul>";
echo "</div>";

echo "<div class='text-center mt-4'>";
echo "<a href='public/' class='btn btn-success btn-lg'>Go to Login Page</a>";
echo "<a href='fix_passwords.php' class='btn btn-secondary'>Run Again</a>";
echo "</div>";

echo "</div></div></body></html>";
?>

