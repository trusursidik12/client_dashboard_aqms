<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('Templates/Header') ?>
    <?= $this->renderSection('sectionheader') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?= $this->include('Templates/Navbar') ?>
        <?= $this->renderSection('sectionnavbar') ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('/') ?>" class="brand-link">
                <?php if (empty(@getCompanyProfile()->name)) : ?>
                    <img src="<?= base_url('assets/dist/img/trusur.png') ?>" alt="<?= @getCompanyProfile()->name ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
                <?php else : ?>
                    <img src="<?= base_url('assets/dist/img/' . @getCompanyProfile()->logo) ?>" alt="<?= @getCompanyProfile()->name ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
                <?php endif ?>
                <span class="brand-text font-weight-light"><?= @getCompanyProfile()->name ?></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel pt-3 pb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/dist/img/akun.png') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= session('session_name') ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?= $this->include('Templates/Sidebar') ?>
                        <?= $this->renderSection('sectionsidebar') ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= @$title ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
                                <li class="breadcrumb-item active"><?= @$title ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('sectioncontent') ?>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <?= $this->include('Templates/Footer') ?>
        <?= $this->renderSection('sectionfooter') ?>

    </div>
    <!-- ./wrapper -->

    <?= $this->include('Templates/Js') ?>
    <?= $this->renderSection('sectionjs') ?>
</body>

</html>