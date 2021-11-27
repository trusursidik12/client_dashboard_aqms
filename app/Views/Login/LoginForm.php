<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('Templates/Header') ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- logo -->
        <div class="login-logo mb-4">
            <?php if (empty($logo)) : ?>
                <img src="<?= base_url('assets/dist/img/trusur.png') ?>" alt="PT. Trusur Unggul Teknusa" width="50%">
            <?php else : ?>
                <img src="<?= base_url('assets/dist/img/' . $logo->logo) ?>" alt="<?= $logo->name ?>" width="50%">
            <?php endif ?>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success rounded" role="alert">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif ?>
                <p class="login-box-msg">Login untuk memulai sesi Anda</p>

                <form action="<?= base_url('session-in') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="input-group">
                        <input type="email" name="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email') ?>
                        </div>
                    </div>
                    <?php if (session()->getFlashdata('noemail')) : ?>
                        <small class="text-danger">
                            <?= session()->getFlashdata('noemail') ?>
                        </small>
                    <?php endif ?>
                    <div class="input-group mt-3">
                        <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password') ?>
                        </div>
                    </div>
                    <?php if (session()->getFlashdata('didntmatch')) : ?>
                        <small class="text-danger">
                            <?= session()->getFlashdata('didntmatch') ?>
                        </small>
                    <?php endif ?>
                    <div class="row mt-3">
                        <div class="col-8">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                </p>
            </div>
        </div>
    </div>

    <?= $this->include('Templates/Js') ?>

</body>

</html>