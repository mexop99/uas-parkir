    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url() ?>/asset/index2.html"><b>UAS</b>Parkir</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('auth') ?>" method="post">
                    <div class="input-group mt-3">
                        <input type="text" name="username" class="form-control" placeholder="Email"
                        value="<?= set_value('username'); ?>" autofocus>                      
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

                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url(); ?>auth/register" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>