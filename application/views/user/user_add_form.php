<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">MyGudang</a></li>
                    <li class="breadcrumb-item active">users / add user</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- ======================================================================================== -->
<!-- Main content -->
<section class="content">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h1 class="card-title">Add User</h1>
            <div class="card-tools">
                <a href="<?= base_url('users') ?>" class="btn btn-warning text-dark">
                    <i class="fas fa-undo"></i>Back
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?= base_url('users/add') ?>" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-8">

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Full Name" value="<?= set_value('name') ?>">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="email" class="form-control" id="username" name="username" placeholder="Type Your Email..." value="<?= set_value('username') ?>">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="******">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                        <div class="form-group">
                            <label for="password2">Confirm Password</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="******">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input id="image" type="file" class="custom-file-input" name="image">
                                        <label for="image" class="custom-file-label"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select name="role_id" id="role_id" class="custom-select">
                                <option value="" hidden>- Pilih -</option>
                                <option value="2" <?= set_value('role_id') == 2 ? 'selected' : null ?>>Karyawan</option>
                                <option value="1" <?= set_value('role_id') == 1 ? 'selected' : null ?>>Administrator</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Save
                </button>
                <button type="reset" class="btn btn-secondary">
                    <i class="fas fa-undo"></i>Reset
                </button>
            </div>
        </form>
        <!-- form end -->

    </div>
    <!-- /.card -->
</section>
<!-- /.content -->