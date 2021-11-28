<?= $this->extend('Templates/Content') ?>

<?= $this->section('sectioncontent') ?>
<!-- alert -->
<div class="row">
    <div class="col-12">
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="row my-2">
            <div class="col">
                <a href="<?= base_url('') ?>" class="btn btn-info"><i class="fas fa-arrow-circle-left mx-3"></i></a>
            </div>
        </div>
        <form class="row g-3" action="<?= base_url('change-password-update') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="col-md-12">
                <label class="form-label">Password Baru</label>
                <input type="hidden" name="id" value="<?= $user->id ?>">
                <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Password Baru ..">
                <div class="invalid-feedback">
                    <?= $validation->getError('password') ?>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary px-3"><i class="fas fa-save mr-2"></i> Ubah</button>
                <button type="Reset" class="btn btn-secondary px-3"><i class="fas fa-redo-alt mr-2"></i> Batal</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('sectionjs') ?>

<?= $this->include('Templates/Alert') ?>

<?= $this->endSection() ?>