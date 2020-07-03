<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <?= $this->session->flashdata('message'); ?>
                <h1><?= $titlePage ?></h1>
            </div>
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">MyGudang</a></li>
                    <li class="breadcrumb-item active">users</li>
                </ol>
            </div> -->
        </div>
        <div class="pull-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                + Add Cost
            </button>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- ======================================================================================== -->
<!-- Main content -->

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Harga Parkir</h3>

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
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Kendaraan</th>
                        <th> Roda </th>
                        <th>Tarif</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    /**
                     * View All User Data
                     * menampilkan data semua user
                     */
                    foreach ($cost as $c) : ?>
                        <tr>
                            <td> <?= $no++ ?> </td>
                            <td> <?= $c->nama_kendaraan ?> </td>
                            <td> <?= $c->roda ?> </td>
                            <td> <?= $c->tarif ?> </td>
                            <td>
                                <form action="<?= base_url('parkingcost/delete') ?>" method="POST">

                                    <a href="#" type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-edit<?= $c->id ?>">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <!-- button untuk hapus user -->
                                    <input type="hidden" value="" name="id">
                                    <button class="btn btn-xs btn-danger" onclick="return confirm('anda yakin menghapus [<?= $c->nama_kendaraan ?>] ?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

<!-- modal untuk tambah data -->
    <div class="modal fade" id="modal-add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambahkan Biaya Kendaraan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('parkingcost/add') ?>" method="POST">
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_kendaraan">Nama Kendaraan</label>
                                <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" placeholder="exp. Mobil .....">
                            </div>
                            <div class="form-group">
                                <label for="roda">Roda</label>
                                <input type="number" name="roda" class="form-control" id="roda" placeholder="exp: 4">
                            </div>
                            <div class="form-group">
                                <label for="tarif">Tarif</label>
                                <input type="number" name="tarif" class="form-control" id="tarif" placeholder="exp: 4000">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- akhir modal tambah data -->


    <?php
    /**
     * modal untuk edit data 
     */
    foreach ($cost as $c) : ?>
        <div class="modal fade" id="modal-edit<?= $c->id ?>" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Biaya Kendaraan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('parkingcost/update') ?>" method="POST">
                    <input type="hidden" name="id" id="id" value="<?= $c->id ?>">
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_kendaraan">Nama Kendaraan</label>
                                    <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" placeholder="exp. Mobil ....." value="<?= $c->nama_kendaraan ?>">
                                </div>
                                <div class="form-group">
                                    <label for="roda">Roda</label>
                                    <input type="number" name="roda" class="form-control" id="roda" placeholder="exp: 4" value="<?= $c->roda ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tarif">Tarif</label>
                                    <input type="number" name="tarif" class="form-control" id="tarif" placeholder="exp: 4000" value="<?= $c->tarif ?>">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php endforeach; ?>



</section>
<!-- /.content -->