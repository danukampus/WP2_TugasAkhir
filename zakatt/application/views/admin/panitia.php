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
                        <a href="" class="btn btn-primary ml-3 mb-3 mt-3" data-toggle="modal" data-target="#newDataPanitiaModal"> Tambah Data Baru <a>
                    </div>
                    <h4 class="ml-4 text-dark mt-3">Ekspor Data</h4>
                    <div class="card-body">
                        <div class="table-responsive col-sm">
                            <table class="table table-bordered" id="tabelpanitia" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>

                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jam Masuk</th>
                                        <th scope="col">Jam Selesai</th>
                                        <th scope="col">Nama Panitia</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Nomor HP</th>
                                        <th scope="col">Catatan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($datapanitia as $pnt) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>

                                            <td><?= date('d F Y', strtotime($pnt['tanggal'])); ?></td>
                                            <td><?= date('H:i', strtotime($pnt['jammasuk'])); ?></td>
                                            <td><?= date('H:i', strtotime($pnt['jamakhir'])); ?></td>
                                            <td><?= $pnt['namapanitia'] ?></td>
                                            <td><?= $pnt['alamat'] ?></td>
                                            <td><?= $pnt['nohp'] ?></td>
                                            <td><?= $pnt['catatan'] ?></td>
                                            <!-- tombol edit zakat -->
                                            <td class="row justify-content-center">
                                                <a href="" class="btn btn-success btn-xs ml-2" data-toggle="modal" data-target="#newUbahPanitiaModel" id="btn-ubahdatapanitia" data-kodepanitia="<?= $pnt['kodepanitia']; ?>" data-tanggal=" <?= $pnt['tanggal']; ?>" data-jammasuk="<?= $pnt['jammasuk']; ?>" data-jamakhir="<?= $pnt['jamakhir']; ?>" data-namapanitia="<?= $pnt['namapanitia']; ?>" data-alamat="<?= $pnt['alamat']; ?>" data-nohp="<?= $pnt['nohp']; ?>" data-catatan="<?= $pnt['catatan']; ?>"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-xs ml-2" data-toggle="modal" data-target="#newHapusDataModel<?= $pnt['kodepanitia'] ?>"><i class="fa fa-trash"></i></a>
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

    <div class="modal fade" id="newDataPanitiaModal" tabindex="-1" role="dialog" aria-labelledby="newDataPanitiaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDataPanitiaLabel">Tambah Data Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/panitia'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            Tanggal Jaga
                            <input type="date" class="form-control mb-3" name="tanggal" placeholder="Tanggal" required>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    Jam Masuk
                                    <input type="time" class="form-control" name="jammasuk" placeholder="Jam Masuk" required>
                                </div>

                                <div class="col-md-6">
                                    Jam Selesai
                                    <input type="time" class="form-control" name="jamakhir" placeholder="Jam Akhir" required>
                                </div>
                            </div>
                            <input type="text" class="form-control mb-3" name="namapanitia" placeholder="Nama Panitia" onkeypress="return lettersOnly(event);" maxlength="30" required>
                            <input type="text" class="form-control mb-3" name="alamat" placeholder="Alamat" maxlength="30" required>
                            <input type="tel" class="form-control mb-3" id="noponsel" name="nohp" maxlength="15" placeholder="Nomor HP" required>
                            <input type="text" class="form-control mb-3" name="catatan" placeholder="Catatan" maxlength="128">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ubah Data -->
<div class="modal fade" id="newUbahPanitiaModel" tabindex="-1" role="dialog" aria-labelledby="newUbahPanitiaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUbahPanitiaLabel">Ubah Data Panitia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/ubahdatapanitia'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="kodepanitia" name="kodepanitia">
                        Tanggal Jaga
                        <input type="date" class="form-control mb-3" id="tanggal" name="tanggal" placeholder="Tanggal" required>
                        <div class="form-group row">
                            <div class="col-md-6">
                                Jam Masuk
                                <input type="time" class="form-control" id="jammasuk" name="jammasuk" required>
                            </div>
                            <div class="col-md-6">
                                Jam Selesai
                                <input type="time" class="form-control" id="jamakhir" name="jamakhir" required>
                            </div>
                        </div>
                        Nama Panitia
                        <input type="text" class="form-control mb-3" id="namapanitia" name="namapanitia" placeholder="Nama Panitia" maxlength="30" onkeypress="return lettersOnly(event);" required>
                        Alamat
                        <input type="text" class="form-control mb-3" id="alamat" name="alamat" placeholder="Alamat" maxlength="30" required>
                        No HP
                        <input type="text" class="form-control mb-3" id="nohp" name="nohp" onkeypress="return event.charCode >= 48 && event.charCode <=57" placeholder="Nomor HP" maxlength="15" required>
                        Catatan
                        <input type="text" class="form-control mb-3" id="catatan" name="catatan" placeholder="Catatan" maxlength="128">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Hapus data -->
<?php foreach ($datapanitia as $pnt) : ?>
    <div class="modal fade" id="newHapusDataModel<?= $pnt['kodepanitia']; ?>" tabindex="-1" role="dialog" aria-labelledby="newHapusDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newHapusDataModalLabel">Yakin ingin hapus?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Mau hapus data panitia atas nama <?= $pnt['namapanitia']; ?>?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-success" href="<?= base_url('admin/hapusdatapanitia/'); ?><?= $pnt['kodepanitia']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>
</div>