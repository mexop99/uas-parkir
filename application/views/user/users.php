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
            <a href="<?= base_url('users/add') ?>" class="btn btn-primary">
                + Add User
            </a>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- =========================================== -->
<!-- Main content -->

<section class="content">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List Users Registered</h3>

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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Is Active?</th>
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
                    foreach ($users as $row) : ?>
                        <tr>
                            <td> <?= $no++; ?> </td>
                            <td> <?= $row['id'] ?> </td>
                            <td> <?= $row['name'] ?> </td>
                            <td> <?= $row['username'] ?> </td>
                            <td> <?= $row['role_id'] == 1 ? "Admin" : "Petugas Parkir" ?></td>
                            <td> <?= $row['is_active'] == 0 ? "Non Aktif" : "Aktif" ?> </td>
                            <td>
                                <form action="<?= base_url('users/delete') ?>" method="POST">
                                    <a href="<?= base_url('users/edit/' . $row['id']) ?>" title="edit user" class="btn btn-xs btn-warning"> 
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="<?= base_url('users/view') ?>" title="view user" class="btn btn-xs btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <!-- button untuk hapus user -->
                                    <input type="hidden" value="<?= $row['id'] ?>" name="id">
                                    <button class="btn btn-xs btn-danger" onclick="return confirm('anda yakin menghapus [<?= $row['name'] ?>] ?')">
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


</section>
<!-- /.content -->