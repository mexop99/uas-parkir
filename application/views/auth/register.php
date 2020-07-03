<div class="register-box">
    <div class="register-logo">
        <p><b>My</b>Gudang</p>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="<?= base_url(); ?>auth/register" method="POST">
                <div class="input-group mt-3">
                    <input type="text" name="name" class="form-control" placeholder="Full name" autofocus
                    value="<?= set_value('name'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mt-3">
                    <input type="text" name="username" class="form-control" placeholder="Email"
                    value="<?= set_value('username'); ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div>
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="input-group mt-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div>
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="input-group mt-3">
                    <input type="password" name="password2" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div>
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="row mt-3">
                    <!-- <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div> -->
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="<?= base_url(); ?>auth/" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->