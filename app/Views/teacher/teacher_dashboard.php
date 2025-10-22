<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Welcome Header -->
            <div class="card mb-4">
                <div class="card-body text-center p-5">
                    <i class="bi bi-person-workspace" style="font-size: 4rem; color: #667eea;"></i>
                    <h1 class="display-4 fw-bold mt-3">Welcome, Teacher!</h1>
                    <p class="lead text-muted">Manage your classes and interact with your students</p>
                    <hr class="my-4">
                    <p class="mb-0">
                        <span class="badge bg-success me-2">
                            <i class="bi bi-person-circle"></i> <?= esc(session()->get('name')) ?>
                        </span>
                        <span class="badge bg-info">
                            <i class="bi bi-person-badge"></i> Teacher
                        </span>
                    </p>
                </div>
            </div>

            <!-- Teacher Features -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100 border-primary">
                        <div class="card-body text-center">
                            <i class="bi bi-book-half" style="font-size: 3rem; color: #667eea;"></i>
                            <h5 class="card-title mt-3">My Classes</h5>
                            <p class="card-text text-muted">View and manage your assigned classes</p>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="bi bi-list-ul"></i> View Classes
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-success">
                        <div class="card-body text-center">
                            <i class="bi bi-people-fill" style="font-size: 3rem; color: #28a745;"></i>
                            <h5 class="card-title mt-3">Students</h5>
                            <p class="card-text text-muted">View student information and records</p>
                            <a href="#" class="btn btn-outline-success">
                                <i class="bi bi-person-lines-fill"></i> View Students
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-warning">
                        <div class="card-body text-center">
                            <i class="bi bi-clipboard-check" style="font-size: 3rem; color: #ffc107;"></i>
                            <h5 class="card-title mt-3">Grades & Attendance</h5>
                            <p class="card-text text-muted">Record grades and track attendance</p>
                            <a href="#" class="btn btn-outline-warning">
                                <i class="bi bi-pencil-square"></i> Manage Grades
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100 border-info">
                        <div class="card-body text-center">
                            <i class="bi bi-megaphone-fill" style="font-size: 3rem; color: #17a2b8;"></i>
                            <h5 class="card-title mt-3">Announcements</h5>
                            <p class="card-text text-muted">View portal announcements</p>
                            <a href="<?= base_url('announcements') ?>" class="btn btn-outline-info">
                                <i class="bi bi-eye"></i> View Announcements
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Today's Schedule -->
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-calendar-day"></i> Today's Schedule
                    </h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Web Development</h6>
                                <small class="text-muted">8:00 AM - 10:00 AM</small>
                            </div>
                            <p class="mb-1 text-muted">Room 301 - BSIT 3A</p>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Database Management</h6>
                                <small class="text-muted">10:00 AM - 12:00 PM</small>
                            </div>
                            <p class="mb-1 text-muted">Room 302 - BSIT 2B</p>
                        </div>
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Programming Fundamentals</h6>
                                <small class="text-muted">2:00 PM - 4:00 PM</small>
                            </div>
                            <p class="mb-1 text-muted">Room 303 - BSIT 1A</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

