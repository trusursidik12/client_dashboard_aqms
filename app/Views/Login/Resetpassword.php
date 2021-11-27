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
                <p class="login-box-msg">Silakan Masukkan Password Baru Anda</p>

                <form action="<?= base_url('update-password') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group">
                        <input type="hidden" name="email" value="<?= $cekresetpassword->email ?>">
                        <input type="hidden" name="slug" value="<?= $cekresetpassword->slug ?>">
                        <input type="password" name="password" id="showPwd" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="password Baru .. *">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password') ?>
                        </div>
                    </div>
                    <div class="input-group mt-3">
                        <input type="password" name="re_password" id="showPwd2" class="form-control <?= $validation->hasError('re_password') ? 'is-invalid' : '' ?>" placeholder="Ulang Passowrd .. *">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('re_password') ?>
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox my-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck2" onclick="myFunction()">
                        <label class="custom-control-label" for="customCheck2">Tampilkan Password</label>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Update Password</button>
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

    <script>
        function myFunction() {
            var x = document.getElementById("showPwd");
            var y = document.getElementById("showPwd2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script>

</body>

</html>