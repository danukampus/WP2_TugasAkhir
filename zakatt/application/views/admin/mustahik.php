<div class="container-fluid">
    <div class="container-fluid">
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
                    <?= $this->session->flashdata('message') ?>
                    <div class="col-lg-6 py-1">
                        <a href="" class="btn btn-primary ml-3 mb-3 mt-3" data-toggle="modal" data-target="#newDataMustahikModal"> Tambah Data Baru <a>
                    </div>
                    <h4 class="ml-4 text-dark mt-3">Ekspor Data</h4>
                    <div class="card-body">
                        <div class="table-responsive col-sm">
                            <table class="table table-bordered" id="tabelmustahik" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Mustahik</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">RT</th>
                                        <th scope="col">RW</th>
                                        <th scope="col">Jumlah KK</th>
                                        <th scope="col">Jumlah Anggota Keluarga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Catatan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($datamustahik as $msth) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $msth['namamustahik'] ?></td>
                                            <td><?= $msth['alamat'] ?></td>
                                            <td><?= $msth['rt'] ?></td>
                                            <td><?= $msth['rw'] ?></td>
                                            <td><?= $msth['jmlkartukeluarga'] ?></td>
                                            <td><?= $msth['jmlangkeluarga'] ?></td>
                                            <td><?= $msth['status'] ?></td>
                                            <td><?= $msth['catatan'] ?></td>
                                            <!-- tombol edit zakat -->
                                            <td class="row justify-content-center">
                                                <a href="" class="btn btn-success btn-xs ml-2" data-toggle="modal" data-target="#newUbahMustahikModal" id="btn-ubahdatamustahik" data-kodemustahik="<?= $msth['kodemustahik']; ?>" data-namamustahik="<?= $msth['namamustahik']; ?>" data-alamat="<?= $msth['alamat']; ?>" data-rt="<?= $msth['rt']; ?>" data-rw="<?= $msth['rw']; ?>" data-jmlkartukeluarga="<?= $msth['jmlkartukeluarga']; ?>" data-jmlangkeluarga="<?= $msth['jmlangkeluarga']; ?>" data-status="<?= $msth['status']; ?>" data-catatan="<?= $msth['catatan']; ?>"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-xs ml-2" data-toggle="modal" data-target="#newHapusDataModal<?= $msth['kodemustahik'] ?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Tambah Data -->

    <div class="modal fade" id="newDataMustahikModal" tabindex="-1" role="dialog" aria-labelledby="newDataMustahikLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDataMustahikLabel">Tambah Data Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/mustahik'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" name="namamustahik" placeholder="Nama Mustahik" onkeypress="return lettersOnly(event);" maxlength="50" required>
                            <input type="text" class="form-control mb-3" name="alamat" placeholder="Alamat" maxlength="50" required>
                            <div class="form-group row">
                                <div class="col-md-6 mt-1">

                                    <input type="text" class="form-control mb-3" name="rt" onkeypress="return event.charCode >= 48 && event.charCode <=57" minlength="3" maxlength="3" placeholder="RT Mustahik" required>
                                </div>
                                <div class="col-md-6 mt-1">

                                    <input type="text" class="form-control mb-3" name="rw" onkeypress="return event.charCode >= 48 && event.charCode <=57" minlength="3" maxlength="3" placeholder="RW Mustahik" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mt-1">
                                    <input type="text" class="form-control mb-3" name="jmlkartukeluarga" onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="3" placeholder="Jml. Kartu Keluarga" required>
                                </div>
                                <div class="col-md-6 mt-1">
                                    <input type="text" class="form-control mb-3" name="jmlangkeluarga" onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="3" placeholder="Jml. Anggota Keluarga" required>
                                </div>
                            </div>
                            Pilih Status Mustahik
                            <select class="form-control mt-1 mb-3" name="status" aria-label="Pilih Status Mustahik" required>
                                <option selected></option>
                                <option value="Tidak Mampu">Tidak Mampu</option>
                                <option value="Janda/Duda">Janda/Duda</option>
                                <option value="Yatim/Piatu">Yatim/Piatu</option>
                            </select>
                            <input type="text" class="form-control mb-3" name="catatan" maxlength="128" placeholder="Catatan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Ubah Data -->

    <div class="modal fade" id="newUbahMustahikModal" tabindex="-1" aria-labelledby="newUbahMustahikLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUbahMustahikLabel">Ubah data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/ubahdatamustahik'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="kodemustahik" id="kodemustahik">
                            Nama Mustahik
                            <input type="text" class="form-control mb-3" id="namamustahik" name="namamustahik" placeholder="Nama Mustahik" onkeypress="return lettersOnly(event);" maxlength="30" required>
                            Alamat
                            <input type="text" class="form-control mb-3" id="alamat" name="alamat" placeholder="Alamat" maxlength="30" required>
                            <div class="form-group row">
                                <div class="col-md-6 mt-1">
                                    RT
                                    <input type="text" class="form-control mb-3" id="rt" name="rt" onkeypress="return event.charCode >= 48 && event.charCode <=57" minlength="3" maxlength="3" placeholder="RT Mustahik" required>
                                </div>
                                <div class="col-md-6 mt-1">
                                    RW
                                    <input type="text" class="form-control mb-3" id="rw" name="rw" onkeypress="return event.charCode >= 48 && event.charCode <=57" minlength="3" maxlength="3" placeholder="RW Mustahik" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mt-1">
                                    Jumlah Kartu Keluarga
                                    <input type="text" class="form-control mb-3" id="jmlkartukeluarga" name="jmlkartukeluarga" onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="3" placeholder="Jml. Kartu Keluarga" required>
                                </div>
                                <div class="col-md-6 mt-1">
                                    Jumlah Anggota Keluarga
                                    <input type="text" class="form-control mb-3" id="jmlangkeluarga" name="jmlangkeluarga" onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="3" placeholder="Jml. Anggota Keluarga" required>
                                </div>
                            </div>
                            Pilih Status Mustahik
                            <select class="form-control mt-1 mb-3" id="status" name="status" aria-label="Pilih Status Mustahik" required>
                                <option selected></option>
                                <option value="Tidak Mampu">Tidak Mampu</option>
                                <option value="Janda/Duda">Janda/Duda</option>
                                <option value="Yatim/Piatu">Yatim/Piatu</option>
                            </select>
                            Catatan
                            <input type="text" class="form-control mb-3" id="catatan" name="catatan" maxlength="128" placeholder="Catatan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Hapus data -->
    <?php foreach ($datamustahik as $msth) : ?>
        <div class="modal fade" id="newHapusDataModal<?= $msth['kodemustahik']; ?>" tabindex="-1" role="dialog" aria-labelledby="newHapusDataModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newHapusDataModalLabel">Yakin ingin hapus?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Mau hapus data mustahik atas nama <?= $msth['namamustahik']; ?>?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-success" href="<?= base_url('admin/hapusdatamustahik/'); ?><?= $msth['kodemustahik']; ?>">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
</div>