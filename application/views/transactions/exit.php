<!-- Content Header (Page header) -->
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="flash-data-success" data-flashdata="<?= $this->session->flashdata('message'); ?>">
                </div>
                <h1><?= $titlePage ?></h1>
                <span><?= date('Y-m-d') ?></span>
                <h4>
                </h4>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- =========================================== -->
<!-- Main content -->

<section class="content">
    <div class="container">
        <div class="row">


            <!-- div untuk memasukan data kendaraan yang parkir -->
            <div class="col-sm-4">
                <div class="card card-navy ">
                    <div class="card-header">
                        <h3 class="card-title">Tulis Nomor Plat Kendaraan Keluar</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?= base_url('transactions/exit') ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nomor Plat</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><input class="form-control" type="text" name="plat" size="3" value="L"></span>
                                        <input type="number" class="form-control" id="" placeholder="Nomor Plat" name="nomor" autofocus>
                                        <span class="input-group-text"><input class="form-control" type="text" name="back" size="5"></span>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn bg-navy">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>


            <!-- table untuk menampilkan data kendaraan KELUAR -->
            <div class="col-sm-8">
                <div class="card p-3">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kendaraan Parkir KELUAR</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nomor Plat</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($parkingExit  as $value) :
                                ?>
                                    <tr>
                                        <td><?= $value->id ?></td>
                                        <td><?= $value->plat_number ?></td>
                                        <td><?= $value->nama_kendaraan ?></td>
                                        <td>
                                            <span class="badge bg-danger">exit</span>
                                        </td>
                                        <td>
                                            <a href="#" title="lihat detail" type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit<?= $value->id ?>">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>




            <!-- table untuk menampilkan data kendaraan Masuk -->
            <div class="col-12">
                <div class="card p-3">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kendaraan Parkir Masuk</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 200px;">
                        <table class="table table-head-fixed text-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nomor Plat</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($parkingEnter  as $value) :
                                ?>
                                    <tr>
                                        <td><?= $value->id ?></td>
                                        <td><?= $value->plat_number ?></td>
                                        <td><?= $value->nama_kendaraan ?></td>
                                        <td>
                                            <span class="badge bg-success">enter</span>
                                        </td>
                                        <td>
                                            <a href="#" title="lihat detail" type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit<?= $value->id ?>">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>


    <?php
    /**
     * modal untuk detail data PARKIR MASUK
     */
    foreach ($parkingEnter as $c) : ?>
        <div class="modal fade" id="modal-edit<?= $c->id ?>" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Kendaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Label</th>
                                    <th>keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>ID Parkir</td>
                                    <td><?= $c->id ?></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Plat Nomor</td>
                                    <td><?= $c->plat_number ?></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Jenis Kendaraan</td>
                                    <td><?= $c->nama_kendaraan . " [" . $c->parking_cost_id . "] " ?></td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Petugas Parkir Masuk</td>
                                    <td><?= $c->usr_enter . " [" . $c->user_id_enter . "] " ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php endforeach; ?>

    <?php
    /**
     * modal untuk detail data PARKIR KELUAR
     */
    foreach ($parkingExit as $c) : ?>
        <div class="modal fade" id="modal-edit<?= $c->id ?>" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Kendaran KELUAR</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="callout callout-success">
                            <h2 class="text text-danger"><strong>Rp. <?= $c->total_tarif ?>,-</strong></h2>
                            <p>Total Tarif</p>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Label</th>
                                    <th>keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>ID Parkir</td>
                                    <td><?= $c->id ?></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Plat Nomor</td>
                                    <td><?= $c->plat_number ?></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Jenis Kendaraan</td>
                                    <td><?= $c->nama_kendaraan . " [" . $c->parking_cost_id . "] " ?></td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Petugas Parkir Masuk</td>
                                    <td><?= $c->usr_enter . " [" . $c->user_id_enter . "] " ?></td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Petugas Parkir Keluar</td>
                                    <td><?= $c->usr_exit . " [" . $c->user_id_exit . "] " ?></td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Waktu Masuk</td>
                                    <td><?= $c->time_enter ?></td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Waktu Keluar</td>
                                    <td><?= $c->time_exit ?></td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>tarif</td>
                                    <td><?= $c->total_tarif ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php endforeach; ?>




</section>