<li class="nav-item">
    <a href="<?= base_url('dashboard') ?>" class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Dashboard
        </p>
    </a>
</li>
<li class="nav-item <?= uri_string() == 'daftar-level' || uri_string() == 'daftar-akun' || uri_string() == 'tambah-akun' ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link <?= uri_string() == 'daftar-level' || uri_string() == 'daftar-akun' || uri_string() == 'tambah-akun' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Akun
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('daftar-level') ?>" class="nav-link <?= uri_string() == 'daftar-level' ? 'active' : '' ?>">
                <i class="fas fa-level-down-alt nav-icon"></i>
                <p>Level</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('daftar-akun') ?>" class="nav-link <?= uri_string() == 'daftar-akun' || uri_string() == 'tambah-akun' ? 'active' : '' ?>">
                <i class="far fa-user nav-icon"></i>
                <p>Akun</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="<?= base_url('daftar-kelas') ?>" class="nav-link <?= uri_string() == 'daftar-kelas' || uri_string() == 'tambah-kelas' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-building"></i>
        <p>
            Kelas
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('daftar-jurusan') ?>" class="nav-link <?= uri_string() == 'daftar-jurusan' || uri_string() == 'tambah-jurusan' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-sitemap"></i>
        <p>
            Jurusan
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('daftar-siswa') ?>" class="nav-link <?= uri_string() == 'daftar-siswa' || uri_string() == 'tambah-siswa' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>
            Siswa
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('daftar-beasiswa') ?>" class="nav-link <?= uri_string() == 'daftar-beasiswa' || uri_string() == 'tambah-beasiswa' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-hand-holding-usd"></i>
        <p>
            Beasiswa
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('daftar-bantuan-penggunaan') ?>" class="nav-link <?= uri_string() == 'daftar-bantuan-penggunaan' || uri_string() == 'tambah-bantuan-penggunaan' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-info"></i>
        <p>
            Bantuan Penggunaan
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('daftar-profil-sekolah') ?>" class="nav-link <?= uri_string() == 'daftar-profil-sekolah' || uri_string() == 'edit-profil-sekolah/1' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-info"></i>
        <p>
            Profil Sekolah
        </p>
    </a>
</li>
<li class="nav-item <?= uri_string() == 'daftar-tagihan' || uri_string() == 'tambah-tagihan' || uri_string() == 'daftar-riwayat-tagihan' ? 'menu-open' : '' ?>">
    <a href="#" class="nav-link <?= uri_string() == 'daftar-tagihan' || uri_string() == 'tambah-tagihan' || uri_string() == 'daftar-riwayat-tagihan' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-money-check-alt"></i>
        <p>
            Tagihan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('daftar-tagihan') ?>" class="nav-link <?= uri_string() == 'daftar-tagihan' ? 'active' : '' ?>">
                <i class="fas fa-shopping-cart nav-icon"></i>
                <p>Tagihan Bulan Ini</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('daftar-riwayat-tagihan') ?>" class="nav-link <?= uri_string() == 'daftar-riwayat-tagihan' ? 'active' : '' ?>">
                <i class="fas fa-file-invoice nav-icon"></i>
                <p>Riwayat Tagihan</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="<?= base_url('daftar-pembayaran') ?>" class="nav-link <?= uri_string() == 'daftar-pembayaran' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        <p>
            Pembayaran
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('daftar-midtrans') ?>" class="nav-link <?= uri_string() == 'daftar-midtrans' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-file-invoice-dollar"></i>
        <p>
            Midtrans
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('daftar-api-midtrans') ?>" class="nav-link <?= uri_string() == 'daftar-api-midtrans' || uri_string() == 'edit-api-midtrans/1' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-cog"></i>
        <p>
            API Midtrans
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('daftar-email-konfigurasi') ?>" class="nav-link <?= uri_string() == 'daftar-email-konfigurasi' || uri_string() == 'edit-email-konfigurasi/1' ? 'active' : '' ?>">
        <i class="nav-icon fas fa-cog"></i>
        <p>
            Email Konfigurasi
        </p>
    </a>
</li>