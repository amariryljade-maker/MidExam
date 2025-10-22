<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Welcome Header -->
            <div class="card mb-4">
                <div class="card-body text-center p-5">
                    <i class="bi bi-shield-check" style="font-size: 4rem; color: #667eea;"></i>
                    <h1 class="display-4 fw-bold mt-3">Welcome, Admin!</h1>
                    <p class="lead text-muted">You have full administrative access to the Student Portal</p>
                    <hr class="my-4">
                    <p class="mb-0">
                        <span class="badge bg-success me-2">
                            <i class="bi bi-person-circle"></i> <?= esc(session()->get('name')) ?>
                        </span>
                        <span class="badge bg-primary">
                            <i class="bi bi-shield-fill"></i> Administrator
                        </span>
                    </p>
                </div>
            </div>

            <!-- Admin Features -->
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-primary">
                        <div class="card-body text-center">
                            <i class="bi bi-people-fill" style="font-size: 3rem; color: #667eea;"></i>
                            <h5 class="card-title mt-3">User Management</h5>
                            <p class="card-text text-muted">Manage students, teachers, and admin accounts</p>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="bi bi-gear"></i> Manage Users
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-success">
                        <div class="card-body text-center">
                            <i class="bi bi-megaphone-fill" style="font-size: 3rem; color: #28a745;"></i>
                            <h5 class="card-title mt-3">Announcements</h5>
                            <p class="card-text text-muted">Create and manage portal announcements</p>
                            <a href="<?= base_url('announcements') ?>" class="btn btn-outline-success">
                                <i class="bi bi-eye"></i> View Announcements
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-info">
                        <div class="card-body text-center">
                            <i class="bi bi-bar-chart-fill" style="font-size: 3rem; color: #17a2b8;"></i>
                            <h5 class="card-title mt-3">Reports & Analytics</h5>
                            <p class="card-text text-muted">View system statistics and reports</p>
                            <a href="#" class="btn btn-outline-info">
                                <i class="bi bi-graph-up"></i> View Reports
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-warning">
                        <div class="card-body text-center">
                            <i class="bi bi-book-fill" style="font-size: 3rem; color: #ffc107;"></i>
                            <h5 class="card-title mt-3">Course Management</h5>
                            <p class="card-text text-muted">Manage courses and curriculum</p>
                            <a href="#" class="btn btn-outline-warning">
                                <i class="bi bi-list-ul"></i> Manage Courses
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-danger">
                        <div class="card-body text-center">
                            <i class="bi bi-gear-fill" style="font-size: 3rem; color: #dc3545;"></i>
                            <h5 class="card-title mt-3">System Settings</h5>
                            <p class="card-text text-muted">Configure portal settings</p>
                            <a href="#" class="btn btn-outline-danger">
                                <i class="bi bi-sliders"></i> Settings
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-secondary">
                        <div class="card-body text-center">
                            <i class="bi bi-calendar-check-fill" style="font-size: 3rem; color: #6c757d;"></i>
                            <h5 class="card-title mt-3">Academic Calendar</h5>
                            <p class="card-text text-muted">Manage academic schedules</p>
                            <a href="#" class="btn btn-outline-secondary">
                                <i class="bi bi-calendar"></i> View Calendar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="card mt-4 bg-light">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-speedometer2"></i> Quick Statistics
                    </h5>
                    <div class="row text-center mt-4">
                        <div class="col-md-3">
                            <h3 class="text-primary">250</h3>
                            <p class="text-muted">Total Students</p>
                        </div>
                        <div class="col-md-3">
                            <h3 class="text-success">45</h3>
                            <p class="text-muted">Total Teachers</p>
                        </div>
                        <div class="col-md-3">
                            <h3 class="text-info">30</h3>
                            <p class="text-muted">Active Courses</p>
                        </div>
                        <div class="col-md-3">
                            <h3 class="text-warning">4</h3>
                            <p class="text-muted">Announcements</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

