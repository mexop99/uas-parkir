<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="nav-icon fas fa-user"></i> &nbsp;
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->




        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url() ?>" class="brand-link">
                <!-- <img src="asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->

                <span class="brand-text font-weight-light"><strong>UAS</strong> Parkir</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('asset/dist/img/') . $user_login['image'] ?>" class="img-circle elevation-2" alt="User Image"> <!-- image user -->
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> <?= $user_login['name']; ?> <i class="fa fa-circle text-success"></i> </a>

                        <small class="d-block text-light"><?= $user_login['username']; ?></small>
                    </div>
                </div>
                <!-- /image user -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview user-panel">
                            <a href="<?= base_url('dashboard'); ?>" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="<?= base_url('transaction'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Transaction
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('transactions/enter') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kendaraan Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kendaraan Keluar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <!-- REPORT -->
                        <li class="nav-item has-treeview">
                            <a href="<?= base_url('report'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Report
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../charts/flot.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Stock</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <!-- LABEL -->
                        <?php if ($this->session->userdata('role_id') == 1) : ?>
                            <li class="nav-header">DATA MASTER</li>
                            <li class="nav-item">
                                <a href="<?= base_url('users'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-users text-danger"></i>
                                    <p class="text">Users</p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="<?= base_url('parkingcost'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Biaya Parkir</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>Laporan</p>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $contents ?>
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.0.1
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="#">MyGudang.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->