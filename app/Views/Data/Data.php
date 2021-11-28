<?= $this->extend('Templates/Content') ?>

<?= $this->section('sectioncontent') ?>

<!-- daftar siswa -->
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="aqm-data-list" class="table border-primary table-striped table-bordered" width="100%">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>ID Stasiun</th>
                        <th>Waktu</th>
                        <?php foreach ($listParams as $lParam) : ?>
                            <th><?= $lParam->name ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('sectionheader') ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/css/dataTables.bootstrap5.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-buttons/css/buttons.dataTables.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('sectionjs') ?>

<!-- DataTables -->
<script src="<?= base_url('assets/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/js/dataTables.bootstrap5.min.js') ?>"></script>

<script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.flash.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        dataTable = $('#aqm-data-list').DataTable({
            "ordering": false,
            "processing": true,
            "serverSide": true,
            "searching": false,
            "pageLength": 50,
            "serverMethod": "post",
            "lengthMenu": [
                [10, 25, 50, 100, 200, 300, 500, -1],
                [10, 25, 50, 100, 200, 300, 500, "All"]
            ],
            "ajax": {
                "url": "<?= base_url('/ajax/aqm-data/station/' . $stationID) ?>",
                "data": function(data) {}
            },
            "columns": [{
                    data: 'no'
                },
                {
                    data: 'station_id'
                },
                {
                    data: 'date_time'
                },
                <?php foreach ($listParams as $lParam) : ?> {
                        data: '<?= $lParam->param ?>'
                    },
                <?php endforeach ?>
            ],
            dom: "lBfrtip",
            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],

        })
    })
</script>
<?= $this->endSection() ?>