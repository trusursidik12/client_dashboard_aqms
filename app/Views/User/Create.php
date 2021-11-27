<?= $this->extend('Templates/Content') ?>

<?= $this->section('sectioncontent') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="row my-2">
            <div class="col">
                <a href="<?= base_url('user') ?>" class="btn btn-primary"><i class="fas fa-arrow-circle-left mx-3"></i></a>
            </div>
        </div>
        <form class="row g-3" action="<?= base_url('user-save') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="col-md-12">
                <label class="form-label">Level * (<small class="text-danger">level admin bisa membuat, mengubah, dan menghapus user</small>)</label>
                <select name="level_id" class="form-control <?= $validation->hasError('level_id') ? 'is-invalid' : '' ?>">
                    <option value="">-- Pilih Level --</option>
                    <?php foreach ($level as $llist) : ?>
                        <option value="<?= $llist->id ?>" <?= old('level_id') == $llist->id ? 'selected' : '' ?>><?= $llist->name ?></option>
                    <?php endforeach ?>
                </select>
                <input type="hidden" name="status_id" value="1">
                <div class="invalid-feedback">
                    <?= $validation->getError('level_id') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">NIP</label>
                <input type="number" name="nip" class="form-control <?= $validation->hasError('nip') ? 'is-invalid' : '' ?>" placeholder="nip .." value="<?= old('nip') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nip') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Nama Lengkap *</label>
                <input type="text" name="full_name" class="form-control <?= $validation->hasError('full_name') ? 'is-invalid' : '' ?>" placeholder="Nama Lengkap .. *" value="<?= old('full_name') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('full_name') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Telepon</label>
                <input type="number" name="phone" class="form-control <?= $validation->hasError('phone') ? 'is-invalid' : '' ?>" placeholder="Telepon .." value="<?= old('phone') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('phone') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Email *</label>
                <input type="email" name="email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : '' ?>" placeholder="Email .. *" value="<?= old('email') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('email') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Password *</label>
                <input type="password" name="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Password .. *" value="<?= old('password') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('password') ?>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary px-3"><i class="fas fa-save mr-2"></i> Simpan</button>
                <button type="Reset" class="btn btn-secondary px-3"><i class="fas fa-redo-alt mr-2"></i> Batal</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>