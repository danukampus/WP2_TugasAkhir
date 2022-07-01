<body class="bg-gradient-primary">
    <div class="container"><br><br><br>
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card o-hidden border-0 shadow-lg my-5 col-lg-10 mx-auto">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Daftar</h1>
                                        <?= $this->session->flashdata('message') ?>
                                    </div>
                                    <form class="user" method="post" action="<?= base_url('auth/registration') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="name" placeholder="Nama Anda" name="name" required>
                                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email" placeholder="Email Anda" name="email" value="<?= set_value('email'); ?>" , required>
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password1" placeholder="Password Anda" name="password1" required>
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password2" placeholder="Password Anda" name="password2" required>
                                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button><br>
                                        <a href="<?= base_url('auth')?>">Sudah punya akun ?, Masuk</a>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>