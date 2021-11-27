<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('Admin/Templates/Header') ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- logo -->
        <div class="login-logo mb-4">
            <img src="<?= base_url('assets/dist/img/logo.png') ?>" alt="SMAIT ASY-SYUKRIYYAH" width="50%">
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success rounded" role="alert">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif ?>
                <p class="login-box-msg">Silakan Masukkan Email Anda Untuk Mendapatkan Link Reset Password</p>

                <form action="<?= base_url('reset-password') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group">
                        <input type="email" name="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" placeholder="Email .. *">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email') ?>
                        </div>
                    </div>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <small class="text-danger">
                            <?= session()->getFlashdata('error') ?>
                        </small>
                    <?php endif ?>
                    <div class="row mt-3">
                        <div class="col-6">
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="<?= base_url('login') ?>">Halaman Login</a>
                </p>
            </div>
        </div>
    </div>

    <?= $this->include('Admin/Templates/Js') ?>

</body>

</html>