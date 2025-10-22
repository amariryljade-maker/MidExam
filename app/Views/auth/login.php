<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <i class="bi bi-mortarboard-fill" style="font-size: 3rem; color: #667eea;"></i>
                        <h2 class="mt-3 mb-1">Welcome Back</h2>
                        <p class="text-muted">Login to your Student Portal</p>
                    </div>

                    <?php if (session()->has('errors')): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach (session('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('login') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope"></i> Email Address
                            </label>
                            <input 
                                type="email" 
                                class="form-control form-control-lg" 
                                id="email" 
                                name="email" 
                                value="<?= old('email') ?>"
                                placeholder="Enter your email"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock"></i> Password
                            </label>
                            <input 
                                type="password" 
                                class="form-control form-control-lg" 
                                id="password" 
                                name="password" 
                                placeholder="Enter your password"
                                required
                            >
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </button>
                        </div>
                    </form>

                    <hr>

                    <div class="text-center">
                        <p class="mb-0">Don't have an account? <a href="<?= base_url('register') ?>" class="text-decoration-none">Register here</a></p>
                    </div>

                    <div class="mt-4 p-3 bg-light rounded">
                        <p class="mb-2 fw-bold small">Test Accounts:</p>
                        <p class="mb-1 small"><strong>Admin:</strong> admin@rmmc.edu.ph / admin123</p>
                        <p class="mb-1 small"><strong>Teacher:</strong> teacher@rmmc.edu.ph / teacher123</p>
                        <p class="mb-0 small"><strong>Student:</strong> student@rmmc.edu.ph / student123</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

