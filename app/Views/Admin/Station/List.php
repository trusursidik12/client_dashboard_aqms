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
<!-- daftar akun -->
<div class="row">
    <div class="col-md-12">
        <div class="row my-2">
            <div class="col-sm my-1">
                <a href="<?= base_url('aqm-station/create') ?>" class="btn btn-info"><i class="fas fa-plus-circle mx-3"></i></a>
            </div>
        </div>
        <div class="table-responsive">
            <table id="aqm-station-lists" class="table border-primary table-striped table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th width="150" nowrap></th>
                        <th width="100">ID Stasiun</th>
                        <th width="300">Nama&nbsp;Stasiun</th>
                        <th width="100">Kota</th>
                        <th width="300">Provinsi</th>
                        <th width="100">Alamat</th>
                        <th width="100">Latitude</th>
                        <th width="100">Longitude</th>
                        <th width="100">Operator</th>
                        <th width="100">ISPU</th>
                        <th width="200">Dibuat&nbsp;Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    <?php foreach ($stations as $list) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <a href="<?= base_url('aqm-station/edit/' . $list->id) ?>" class="btn btn-primary btn-sm mx-1"><i class="fas fa-edit"></i></a>
                                <a id="getdeleteid" data-deleteid="<?= $list->id ?>" class="btn btn-danger btn-sm mx-1" data-toggle="modal" data-target="#modal-delete"><i class="fas fa-trash"></i></a>
                            </td>
                            <td><?= $list->station_id ?></td>
                            <td><?= $list->name ?></td>
                            <td><?= $list->city ?></td>
                            <td><?= $list->province ?></td>
                            <td><?= $list->address ?></td>
                            <td><?= $list->lat ?></td>
                            <td><?= $list->lon ?></td>
                            <td><?= $list->operator ?></td>
                            <td class="text-center"><?= $list->is_ispu == 1 ? '<span class="badge badge-success">ISPU</span>' : '<span class="badge badge-danger">Tidak Ada ISPU</span>' ?></td>
                            <td><?= $list->created_by ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal delete -->
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <form action="<?= base_url('aqm-station-delete') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h4 class="modal-title text-white">Konfirmasi Penghapusan!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="deleteid">
                    <p class="text-white">Anda yakin ingin menghapus data ini ?&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-outline-light">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('sectionheader') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/dataTables.bootstrap5.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('sectionjs') ?>
<!-- DataTables -->
<script src="<?= base_url('assets/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/js/dataTables.bootstrap5.min.js') ?>"></script>

<script>
    // list aqm station
    $(document).ready(function() {
        // datatables
        $('#aqm-station-lists').DataTable();
    })
    // get id aqm station
    $(document).on('click', '#getdeleteid', function() {
        $('#deleteid').val($(this).data('deleteid'));
    })
</script>

<?= $this->include('Templates/Alert') ?>

<?= $this->endSection() ?>