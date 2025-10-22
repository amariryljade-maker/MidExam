<?php
/**
 * Installation Checker
 * Checks if CodeIgniter 4 is installed and provides download instructions
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation Check - MidExam Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 50px 0;
        }
        .check-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            padding: 40px;
        }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        .warning { color: #ffc107; }
        .check-item {
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
            <div class="col-md-10">
                <div class="check-card">
                    <h1 class="text-center mb-4">
                        <i class="bi bi-clipboard-check"></i>
                        Installation Status Check
                    </h1>
                    <p class="text-center text-muted mb-4">MidExam Project - RMMC</p>

                    <h4 class="mb-4">System Requirements Check:</h4>

                    <?php
                    $allGood = true;

                    // Check PHP Version
                    echo '<div class="check-item">';
                    echo '<strong>PHP Version:</strong> ' . PHP_VERSION . '<br>';
                    if (version_compare(PHP_VERSION, '7.4.0', '>=')) {
                        echo '<span class="success">✓ PHP 7.4+ required - OK</span>';
                    } else {
                        echo '<span class="error">✗ PHP 7.4 or higher is required</span>';
                        $allGood = false;
                    }
                    echo '</div>';

                    // Check for required PHP extensions
                    $required_extensions = ['mysqli', 'intl', 'json', 'mbstring', 'curl'];
                    echo '<div class="check-item">';
                    echo '<strong>Required PHP Extensions:</strong><br>';
                    foreach ($required_extensions as $ext) {
                        if (extension_loaded($ext)) {
                            echo '<span class="success">✓ ' . $ext . '</span><br>';
                        } else {
                            echo '<span class="error">✗ ' . $ext . ' (missing)</span><br>';
                            $allGood = false;
                        }
                    }
                    echo '</div>';

                    // Check for writable directory
                    echo '<div class="check-item">';
                    echo '<strong>Writable Directory:</strong><br>';
                    if (is_writable(__DIR__ . '/writable')) {
                        echo '<span class="success">✓ writable/ folder is writable</span>';
                    } else {
                        echo '<span class="warning">⚠ writable/ folder may not be writable</span><br>';
                        echo '<small>You may need to set permissions on the writable folder</small>';
                    }
                    echo '</div>';

                    // Check for vendor/codeigniter4
                    echo '<div class="check-item">';
                    echo '<strong>CodeIgniter 4 Framework:</strong><br>';
                    if (file_exists(__DIR__ . '/vendor/codeigniter4/framework/system/bootstrap.php')) {
                        echo '<span class="success">✓ CodeIgniter 4 is installed</span>';
                    } else {
                        echo '<span class="error">✗ CodeIgniter 4 is NOT installed</span><br>';
                        echo '<small>This is the issue causing the "system folder path" error</small>';
                        $allGood = false;
                    }
                    echo '</div>';

                    // Check for database
                    echo '<div class="check-item">';
                    echo '<strong>Database Connection:</strong><br>';
                    $conn = @mysqli_connect('localhost', 'root', '');
                    if ($conn) {
                        echo '<span class="success">✓ MySQL is running</span><br>';
                        $db_exists = @mysqli_select_db($conn, 'student_portal');
                        if ($db_exists) {
                            echo '<span class="success">✓ Database "student_portal" exists</span>';
                        } else {
                            echo '<span class="warning">⚠ Database "student_portal" not found</span><br>';
                            echo '<small>Run setup.php to create the database</small>';
                        }
                        mysqli_close($conn);
                    } else {
                        echo '<span class="error">✗ Cannot connect to MySQL</span><br>';
                        echo '<small>Make sure WAMP/MySQL is running</small>';
                    }
                    echo '</div>';
                    ?>

                    <?php if (!$allGood): ?>
                        <div class="alert alert-danger mt-4">
                            <h4><i class="bi bi-exclamation-triangle-fill"></i> Action Required!</h4>
                            <p class="mb-3">CodeIgniter 4 framework needs to be installed.</p>
                            
                            <h5>Option 1: Install via Composer (Recommended)</h5>
                            <p>Open command prompt in this folder and run:</p>
                            <div class="bg-dark text-white p-3 rounded mb-3">
                                <code>composer install</code>
                            </div>
                            
                            <h5>Option 2: Download Manually</h5>
                            <ol>
                                <li>Download CodeIgniter 4 from: 
                                    <a href="https://github.com/codeigniter4/CodeIgniter4/archive/refs/heads/develop.zip" target="_blank" class="btn btn-sm btn-primary">
                                        Download CodeIgniter 4
                                    </a>
                                </li>
                                <li>Extract the downloaded file</li>
                                <li>Copy the <code>vendor</code> folder to this project directory</li>
                                <li>Refresh this page to check again</li>
                            </ol>

                            <h5>Option 3: Use Composer via WAMP</h5>
                            <ol>
                                <li>Download Composer from: <a href="https://getcomposer.org/download/" target="_blank">getcomposer.org</a></li>
                                <li>Install Composer on your system</li>
                                <li>Open command prompt in <code>C:\wamp64\www\MIdExam</code></li>
                                <li>Run: <code>composer install</code></li>
                            </ol>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-success mt-4">
                            <h4><i class="bi bi-check-circle-fill"></i> All Requirements Met!</h4>
                            <p class="mb-0">Your system is ready to run the application.</p>
                        </div>
                    <?php endif; ?>

                    <div class="card mt-4">
                        <div class="card-header bg-primary text-white">
                            <strong>Next Steps</strong>
                        </div>
                        <div class="card-body">
                            <ol>
                                <?php if (!file_exists(__DIR__ . '/vendor/codeigniter4')): ?>
                                    <li class="mb-2">
                                        <strong>Install CodeIgniter 4</strong> (see instructions above)
                                    </li>
                                <?php endif; ?>
                                <li class="mb-2">
                                    <a href="setup.php" class="btn btn-sm btn-primary">Run setup.php</a>
                                    to create database and tables
                                </li>
                                <li class="mb-2">
                                    <a href="public/index.php" class="btn btn-sm btn-success">Launch Application</a>
                                    to start using the portal
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="check_install.php" class="btn btn-secondary">
                            <i class="bi bi-arrow-clockwise"></i> Re-check Installation
                        </a>
                    </div>

                </div>

                <div class="text-center mt-4">
                    <p class="text-white">
                        <small>For detailed instructions, see README_FIRST.md or INSTALLATION_GUIDE.md</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>

