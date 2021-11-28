<li class="nav-item">
    <a href="<?= base_url('') ?>" class="nav-link <?= uri_string() == '' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Status
        </p>
    </a>
</li>
<li class="nav-item <?= uri_string() == 'daftar-level' || uri_string() == 'daftar-akun' || uri_string() == 'tambah-akun' ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link <?= uri_string() == 'daftar-level' || uri_string() == 'daftar-akun' || uri_string() == 'tambah-akun' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-database"></i>
        <p>
            Aqm Data
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <?php foreach (getAqmDataStation() as $aqmData) : ?>
            <li class="nav-item">
                <a href="<?= base_url('aqm-data/station/' . $aqmData->station_id) ?>" class="nav-link <?= uri_string() == 'aqm-data/station' ? 'active' : '' ?>">
                    <i class="fas fa-server nav-icon"></i>
                    <p><?= $aqmData->station_id ?></p>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</li>
<?php if (!empty(getAqmIspuStation())) : ?>
    <li class="nav-item <?= uri_string() == 'daftar-level' || uri_string() == 'daftar-akun' || uri_string() == 'tambah-akun' ? 'menu-open' : '' ?>">
        <a href="#" class="nav-link <?= uri_string() == 'daftar-level' || uri_string() == 'daftar-akun' || uri_string() == 'tambah-akun' ? 'active' : '' ?>">
            <i class="nav-icon fas fa-database"></i>
            <p>
                Aqm Ispu
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <?php foreach (getAqmIspuStation() as $aqmIspu) : ?>
                <li class="nav-item">
                    <a href="<?= base_url('aqm-ispu/station/' . $aqmIspu->stationid) ?>" class="nav-link <?= uri_string() == 'aqm-ispu/station' ? 'active' : '' ?>">
                        <i class="fas fa-server nav-icon"></i>
                        <p><?= $aqmIspu->stationid ?></p>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </li>
<?php endif ?>
<li class="nav-item">
    <a href="<?= base_url('user') ?>" class="nav-link <?= uri_string() == 'user' || uri_string() == 'user/create' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-users"></i>
        <p>
            User
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('aqm-station') ?>" class="nav-link <?= uri_string() == 'aqm-station' || uri_string() == 'aqm-station/create' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-broadcast-tower"></i>
        <p>
            Aqm Stasiun
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('change-password') ?>" class="nav-link <?= uri_string() == 'change-password' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user-cog"></i>
        <p>
            Edit Password
        </p>
    </a>
</li>