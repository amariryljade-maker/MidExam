<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Page Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold text-white">
                    <i class="bi bi-megaphone-fill"></i> Announcements
                </h1>
                <p class="lead text-white-50">Stay updated with the latest news and updates</p>
            </div>

            <!-- Announcements List -->
            <?php if (!empty($announcements)): ?>
                <?php foreach ($announcements as $announcement): ?>
                    <div class="card mb-4 animate__animated animate__fadeIn">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h3 class="card-title mb-0">
                                    <i class="bi bi-pin-angle-fill text-primary"></i>
                                    <?= esc($announcement['title']) ?>
                                </h3>
                                <span class="badge bg-primary">
                                    <i class="bi bi-calendar-event"></i>
                                    <?= date('M d, Y', strtotime($announcement['created_at'])) ?>
                                </span>
                            </div>
                            
                            <div class="card-text text-muted mb-3">
                                <i class="bi bi-clock"></i> 
                                Posted on <?= date('F d, Y \a\t h:i A', strtotime($announcement['created_at'])) ?>
                            </div>

                            <hr>

                            <div class="card-text">
                                <p class="mb-0"><?= nl2br(esc($announcement['content'])) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- No Announcements -->
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-inbox" style="font-size: 4rem; color: #ccc;"></i>
                        <h3 class="mt-3">No Announcements Yet</h3>
                        <p class="text-muted">Check back later for updates and announcements.</p>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Information Card -->
            <div class="card bg-info text-white mt-4">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-info-circle-fill"></i> Information
                    </h5>
                    <p class="card-text mb-0">
                        Announcements are updated regularly. Make sure to check this page frequently for important updates 
                        regarding academic schedules, events, and university news.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

