<?= $this->extend('Templates/Content') ?>

<?= $this->section('sectioncontent') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="row my-2">
            <div class="col">
                <a href="<?= base_url('user') ?>" class="btn btn-info"><i class="fas fa-arrow-circle-left mx-3"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <input type="hidden" id="user_id" value="<?= $user->id ?>">
                <label class="form-label">Stasiun *</label>
                <select id="station_id" class="form-control <?= $validation->hasError('station_id') ? 'is-invalid' : '' ?>">
                    <option value="">-- Pilih Stasiun -- *</option>
                    <?php foreach ($stations as $station) : ?>
                        <option value="<?= $station->station_id ?>"><?= $station->station_id ?></option>
                    <?php endforeach ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('station_id') ?>
                </div>
            </div>
            <div class="col-md-2 mt-3">
                <button type="button" id="add_station" class="btn btn-primary mt-3"><i class="fas fa-plus mr-2"></i> Tambah</button>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md-12">
                <table class="table border-primary table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>User</td>
                            <td>ID Stasiun</td>
                            <td>Hapus</td>
                        </tr>
                    </thead>
                    <tbody id="list-station">
                        <?= view('Admin/UserStation/List') ?>
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
                <button type="button" id="remove_station" class="btn btn-outline-light" data-dismiss="modal">Hapus</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('sectionjs') ?>
<script>
    $(document).ready(function() {
        $("#add_station").click(function() {
            var user_id = $('#user_id').val()
            var station_id = $('#station_id').val()
            if (station_id == '') {
                alert('ID Stasiun kosong ..')
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('station-add') ?>',
                    data: {
                        'add_station': true,
                        'user_id': user_id,
                        'station_id': station_id,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            $('#list-station').load('<?= base_url('station-list/' . $user->id) ?>', function() {
                                $('#station_id').val('')
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

        $("#remove_station").click(function() {
            var deleteid = $('#deleteid').val()
            $.ajax({
                type: 'POST',
                url: '<?= base_url('/station-remove') ?>',
                data: {
                    'remove_station': true,
                    'deleteid': deleteid
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#list-station').load('<?= base_url('station-list/' . $user->id) ?>', function() {})
                    } else {
                        alert('gagal hapus user stasiun')
                    }
                }
            })
        })
    })
</script>
<?= $this->endSection() ?>