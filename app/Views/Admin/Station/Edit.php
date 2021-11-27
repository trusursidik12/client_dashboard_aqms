<?= $this->extend('Templates/Content') ?>

<?= $this->section('sectioncontent') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="row my-2">
            <div class="col">
                <a href="<?= base_url('aqm-station') ?>" class="btn btn-info"><i class="fas fa-arrow-circle-left mx-3"></i></a>
            </div>
        </div>
        <form class="row g-3" action="<?= base_url('aqm-station-update') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="col-md-12">
                <label class="form-label">ID Stasiun *</label>
                <input type="hidden" name="id" value="<?= $aqmStation->id ?>">
                <input type="text" name="station_id" class="form-control <?= $validation->hasError('station_id') ? 'is-invalid' : '' ?>" placeholder="ID Stasiun .. *" value="<?= !empty(old('station_id')) ? old('station_id') : $aqmStation->station_id ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('station_id') ?>
                </div>
                <?php if (session()->getFlashdata('u_stationid')) : ?>
                    <small class="text-danger">
                        <?= session()->getFlashdata('u_stationid') ?>
                    </small>
                <?php endif ?>
            </div>
            <div class="col-md-12">
                <label class="form-label">Nama Stasiun *</label>
                <input type="text" name="name" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" placeholder="Nama Stasiun .. *" value="<?= !empty(old('name')) ? old('name') : $aqmStation->name ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('name') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Kota *</label>
                <input type="text" name="city" class="form-control <?= $validation->hasError('city') ? 'is-invalid' : '' ?>" placeholder="Kota .. *" value="<?= !empty(old('city')) ? old('city') : $aqmStation->city ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('city') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Provinsi *</label>
                <input type="text" name="province" class="form-control <?= $validation->hasError('province') ? 'is-invalid' : '' ?>" placeholder="Provinsi .. *" value="<?= !empty(old('province')) ? old('province') : $aqmStation->province ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('province') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Alamat *</label>
                <input type="text" name="address" class="form-control <?= $validation->hasError('address') ? 'is-invalid' : '' ?>" placeholder="Alamat .. *" value="<?= !empty(old('address')) ? old('address') : $aqmStation->address ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('address') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Latitude *</label>
                <input type="text" name="lat" class="form-control <?= $validation->hasError('lat') ? 'is-invalid' : '' ?>" placeholder="Latitude .. *" value="<?= !empty(old('lat')) ? old('lat') : $aqmStation->lat ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('lat') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Longitude *</label>
                <input type="text" name="lon" class="form-control <?= $validation->hasError('lon') ? 'is-invalid' : '' ?>" placeholder="Longitude .. *" value="<?= !empty(old('lon')) ? old('lon') : $aqmStation->lon ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('lon') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Operator *</label>
                <input type="text" name="operator" class="form-control <?= $validation->hasError('operator') ? 'is-invalid' : '' ?>" placeholder="Operator .. *" value="<?= !empty(old('operator')) ? old('operator') : $aqmStation->operator ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('operator') ?>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Mempunyai Parameter ISPU ? *</label>
                <select name="is_ispu" class="form-control <?= $validation->hasError('is_ispu') ? 'is-invalid' : '' ?>">
                    <option value="1" <?= empty(old('is_ispu')) ? ($aqmStation->is_ispu == 1 ? 'selected' : '') : (old('is_ispu') == 1 ? 'selected' : '') ?>>Ispu</option>
                    <option value="2" <?= empty(old('is_ispu')) ? ($aqmStation->is_ispu == 2 ? 'selected' : '') : (old('is_ispu') == 2 ? 'selected' : '') ?>>Tidak Ada Ispu</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('is_ispu') ?>
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