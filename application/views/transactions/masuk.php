<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <?= $this->session->flashdata('message'); ?>
                <h1><?= $titlePage ?></h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- =========================================== -->
<!-- Main content -->

<section class="content">
    <div class="container">

        <!-- div untuk memasukan data kendaraan yang parkir -->
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tulis Nomor Plat Kendaraan Masuk</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="<?= base_url('transactions/add') ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nomor Plat</label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><input class="form-control" type="text" name="plat" size="1" value="L"></span>
                                        <input type="number" class="form-control" id="" placeholder="Nomor Plat" name="nomor">
                                        <span class="input-group-text"><input class="form-control" type="text" name="back" size="5"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- menampilkan dropdown jenis kendaraan -->
                            <div class="form-group">
                                <label for="cost_id">Jenis Kendaraan</label>
                                <select class="form-control" id="cost_id" name="cost_id">
                                    <option value="" selected disabled hidden>Pilih...</option>
                                    <?php
                                    foreach ($genreCost as $g) : ?>
                                        <option value="<?= $g->id ?>"><?= "[ " . $g->id . " ] - " . $g->nama_kendaraan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- /menampilkan dropdown jenis kendaraan -->

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>


            <!-- table untuk menampilkan data kendaraan Masuk -->
            <div class="col-sm-8">
                <div class="card p-3">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kendaraan Masuk</h3>

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
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nomor Plat</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-success">Approved</span></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>