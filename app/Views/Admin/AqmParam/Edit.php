<?= $this->extend('Templates/Content') ?>

<?= $this->section('sectioncontent') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="row my-2">
            <div class="col">
                <a href="<?= base_url('aqm-station') ?>" class="btn btn-info"><i class="fas fa-arrow-circle-left mx-3"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">ID Stasiun *</label>
                <input type="text" id="station_id" class="form-control" value="<?= $station->station_id ?>" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label">Parameter *</label>
                <select id="list_param_id" class="form-control <?= $validation->hasError('list_param_id') ? 'is-invalid' : '' ?>">
                    <option value="">-- Pilih Parameter -- *</option>
                    <?php foreach ($paramlists as $pList) : ?>
                        <option value="<?= $pList->id ?>"><?= $pList->name ?></option>
                    <?php endforeach ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('list_param_id') ?>
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Satuan *</label>
                <select id="unit_id" class="form-control <?= $validation->hasError('unit_id') ? 'is-invalid' : '' ?>">
                    <option value="">-- Pilih Satuan -- *</option>
                    <?php foreach ($units as $unit) : ?>
                        <option value="<?= $unit->id ?>"><?= $unit->name ?></option>
                    <?php endforeach ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('unit_id') ?>
                </div>
            </div>
            <div class="col-md-2 mt-3">
                <button type="button" id="add_param" class="btn btn-primary mt-3"><i class="fas fa-plus mr-2"></i> Tambah</button>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md-12">
                <table class="table border-primary table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>ID Stasiun</td>
                            <td>Parameter</td>
                            <td>Satuan</td>
                            <td>Hapus</td>
                        </tr>
                    </thead>
                    <tbody id="list-aqm-param">
                        <?= view('Admin/AqmParam/List') ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal delete -->
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <?= csrf_field() ?>
            <div class="modal-header">
                <h4 class="modal-title text-white">Konfirmasi Penghapusan!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="deleteid">
                <p class="text-white">Anda yakin ingin menghapus data ini ?&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
                <button type="button" id="remove_param" class="btn btn-outline-light" data-dismiss="modal">Hapus</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('sectionjs') ?>
<script>
    $(document).ready(function() {
        $("#add_param").click(function() {
            var station_id = $('#station_id').val()
            var list_param_id = $('#list_param_id').val()
            var unit_id = $('#unit_id').val()
            if (list_param_id == '') {
                alert('Parameter kosong ..')
            } else if (unit_id == '') {
                alert('Satuan Parameter kosong ..')
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('param-add') ?>',
                    data: {
                        'add_param': true,
                        'station_id': station_id,
                        'list_param_id': list_param_id,
                        'unit_id': unit_id,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            $('#list-aqm-param').load('<?= base_url('param-list/' . $station->station_id) ?>', function() {
                                $('#list_param_id').val('')
                            })
                        } else {
                            alert('ID Stasiun sudah ada ..')
                        }
                    }
                })
            }
        })

        $(document).on('click', '#getdeleteid', function() {
            $('#deleteid').val($(this).data('deleteid'));
        })

        $("#remove_param").click(function() {
            var deleteid = $('#deleteid').val()
            $.ajax({
                type: 'POST',
                url: '<?= base_url('/param-remove') ?>',
                data: {
                    'remove_param': true,
                    'deleteid': deleteid
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#list-aqm-param').load('<?= base_url('param-list/' . $station->station_id) ?>', function() {})
                    } else {
                        alert('gagal hapus parameter')
                    }
                }
            })
        })
    })
</script>
<?= $this->endSection() ?>