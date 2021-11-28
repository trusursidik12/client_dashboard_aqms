<?= $this->extend('Templates/Content') ?>

<?= $this->section('sectionheader') ?>
<!-- leaflet css -->
<link rel="stylesheet" href="<?= base_url('assets/leaflet/leaflet.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('sectioncontent') ?>
<div class="row">
    <?php foreach ($aqmStations as $station) : ?>
        <div class="<?= $countAqmStation <= 2 ? 'col-md-6' : 'col-md-4' ?>">
            <a href="<?= base_url('aqm-data/station/' . $station['station_id']) ?>">
                <div class="info-box mb-3 <?= @$station['status'] == 'red' ? 'bg-danger' : 'bg-success' ?>">
                    <span class="info-box-icon bg-info elevation-1"><img src="<?= base_url('assets/dist/img/station.png') ?>" alt="aqms station"></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><?= $station['station_id'] . ' | ' . $station['city'] ?></span>
                        <span class="info-box-number"><?= @$station['last_data'] ?></span>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach ?>
</div>

<!-- chart -->
<div class="row">
    <div class="col-sm-12">
        <div class="card p-2">
            <div class="card-header">
                <h3 class="card-title">Lokasi AQMS</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div id="map" style="width: 100%; height: 400px;"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light p-0">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Titik Lokasi Pemasangan AQMS
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('sectionjs') ?>
<!-- leaflet js -->
<script src="<?= base_url('assets/leaflet/leaflet.js') ?>"></script>
<script>
    <?php foreach ($listaqmStations as $location) : ?>
        var map = L.map('map').setView([<?= $location->lat ?>, <?= $location->lon ?>], 9);
        <?php break; ?>
    <?php endforeach ?>

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);

    <?php foreach ($listaqmStations as $location) : ?>
        L.marker([<?= $location->lat ?>, <?= $location->lon ?>]).addTo(map)
            .bindPopup('<?= 'Nama Stasiun :' . $location->name .
                            '<br> Alamat :' . $location->address .
                            '<br> Kota :' . $location->city .
                            '<br> Provinsi :' . $location->province .
                            '<br> Operator / PIC : ' . $location->operator ?>').openPopup();
    <?php endforeach ?>
</script>
<?= $this->endSection() ?>