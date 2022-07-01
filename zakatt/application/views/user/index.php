<div class="container-fluid">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-lg-6 py-3">
                                <h2 class="m-0 font-weight-bold text-primary mt-2"><?= $title; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>
                    <div class="card mb-4 mt-4 ml-4 col-lg-8">
                        <div class="row">
                            <div class="col-md-3 mb-3 mt-3 ml-3">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-6 ml-4">
                                <div class="card-body">
                                    <h5 class="card-title text-primary font-weight-bold"><?= $user['name'] ?></h5>
                                    <p class="card-text">Akun ini digunakan oleh <?= $user['name'] ?> Penerimaan Zakat Masjid Nurul Iman</p>
                                    <p class="card-text"><small class="text-muted"><?= $user['email']; ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->