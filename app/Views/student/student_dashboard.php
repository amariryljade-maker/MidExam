<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Welcome Header -->
            <div class="card mb-4">
                <div class="card-body text-center p-5">
                    <i class="bi bi-person-circle" style="font-size: 4rem; color: #667eea;"></i>
                    <h1 class="display-4 fw-bold mt-3">Welcome, Student!</h1>
                    <p class="lead text-muted">Access your academic information and resources</p>
                    <hr class="my-4">
                    <p class="mb-0">
                        <span class="badge bg-success me-2">
                            <i class="bi bi-person-circle"></i> <?= esc(session()->get('name')) ?>
                        </span>
                        <span class="badge bg-primary">
                            <i class="bi bi-mortarboard-fill"></i> Student
                        </span>
                    </p>
                </div>
            </div>

            <!-- Student Features -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-primary">
                        <div class="card-body text-center">
                            <i class="bi bi-journal-text" style="font-size: 3rem; color: #667eea;"></i>
                            <h5 class="card-title mt-3">My Courses</h5>
                            <p class="card-text text-muted">View your enrolled courses</p>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="bi bi-list-ul"></i> View Courses
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-success">
                        <div class="card-body text-center">
                            <i class="bi bi-bar-chart-line-fill" style="font-size: 3rem; color: #28a745;"></i>
                            <h5 class="card-title mt-3">My Grades</h5>
                            <p class="card-text text-muted">Check your academic performance</p>
                            <a href="#" class="btn btn-outline-success">
                                <i class="bi bi-clipboard-data"></i> View Grades
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-info">
                        <div class="card-body text-center">
                            <i class="bi bi-megaphone-fill" style="font-size: 3rem; color: #17a2b8;"></i>
                            <h5 class="card-title mt-3">Announcements</h5>
                            <p class="card-text text-muted">Stay updated with latest news</p>
                            <a href="/announcements" class="btn btn-outline-info">
                                <i class="bi bi-eye"></i> View Announcements
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-warning">
                        <div class="card-body text-center">
                            <i class="bi bi-calendar-event" style="font-size: 3rem; color: #ffc107;"></i>
                            <h5 class="card-title mt-3">Schedule</h5>
                            <p class="card-text text-muted">View your class schedule</p>
                            <a href="#" class="btn btn-outline-warning">
                                <i class="bi bi-calendar3"></i> View Schedule
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Academic Performance Summary -->
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-trophy"></i> Academic Performance
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <div class="p-3">
                                <h3 class="text-primary">3.75</h3>
                                <p class="text-muted mb-0">Current GPA</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3">
                                <h3 class="text-success">18</h3>
                                <p class="text-muted mb-0">Units Enrolled</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3">
                                <h3 class="text-info">95%</h3>
                                <p class="text-muted mb-0">Attendance Rate</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Exams -->
            <div class="card mt-4">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-alarm"></i> Upcoming Examinations
                    </h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Web Development - Midterm Exam</h6>
                                <small class="text-danger">October 25, 2025</small>
                            </div>
                            <p class="mb-1 text-muted">8:00 AM - Room 301</p>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Database Management - Midterm Exam</h6>
                                <small class="text-danger">October 26, 2025</small>
                            </div>
                            <p class="mb-1 text-muted">10:00 AM - Room 302</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

