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
                    <h4 class="ml-4 text-dark mt-3">Ekspor Data</h4>
                    <?= $this->session->flashdata('message') ?>
                    <div class="card-body">
                        <div class="table-responsive col-sm">
                            <table class="table table-bordered" id="tabelpezakat" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>

                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Nama Pezakat</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Jumlah Jiwa</th>
                                        <th scope="col">Berupa Beras</th>
                                        <th scope="col">Berupa Uang</th>
                                        <th scope="col">Fidyah Beras</th>
                                        <th scope="col">Fidyah Uang</th>
                                        <th scope="col">Infaq</th>
                                        <th scope="col">Zakat Mal</th>
                                        <th scope="col">Total Beras</th>
                                        <th scope="col">Total Uang</th>
                                        <th scope="col">Pencatat 1</th>
                                        <th scope="col">Pencatat 2</th>
                                        <th scope="col">Telah Diubah Admin</th>
                                        <th scope="col">Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>

                                    <?php foreach ($datazakat as $zkt) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= date('d F Y', strtotime($zkt['tanggaljam'])); ?></td>
                                            <td><?= date('H:i', strtotime($zkt['tanggaljam'])); ?></td>
                                            <td><?= $zkt['namapezakat'] ?></td>
                                            <td><?= $zkt['alamat'] ?></td>
                                            <td><?= $zkt['jumlahjiwa'] ?></td>
                                            <td><?= $zkt['berupaberas'] ?></td>
                                            <td><?= $zkt['berupauang'] ?></td>
                                            <td><?= $zkt['fidyahberas'] ?></td>
                                            <td><?= $zkt['fidyahuang'] ?></td>
                                            <td><?= $zkt['infaq'] ?></td>
                                            <td><?= $zkt['zakatmal'] ?></td>
                                            <td><?= $zkt['totalberas'] ?></td>
                                            <td><?= $zkt['totaluang'] ?></td>
                                            <td><?= $zkt['namapanitia'] ?></td>
                                            <td><?= $zkt['panitiajaga2'] ?></td>
                                            <td><?= $zkt['telahdiubahadmin'] ?></td>
                                            <td class="row justify-content-center">
                                                <a href="" class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#newUbahZakatModal" id="btn-ubahdata" data-kodezakat="<?= $zkt['kodezakat']; ?>" data-namapezakat="<?= $zkt['namapezakat']; ?>" data-alamat="<?= $zkt['alamat']; ?>" data-jumlahjiwa="<?= $zkt['jumlahjiwa']; ?>" data-berupaberas="<?= $zkt['berupaberas']; ?>" data-berupauang="<?= $zkt['berupauang']; ?>" data-fidyahberas="<?= $zkt['fidyahberas']; ?>" data-fidyahuang="<?= $zkt['fidyahuang']; ?>" data-infaq="<?= $zkt['infaq']; ?>" data-zakatmal="<?= $zkt['zakatmal']; ?>" data-totalberas="<?= $zkt['totalberas']; ?>" data-totaluang="<?= $zkt['totaluang']; ?>"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-sm btn-danger mb-3" data-toggle="modal" data-target="#newHapusDataModal<?= $zkt['kodezakat'] ?>"><i class="fa fa-trash"></i></a>
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



    <div class="modal fade" id="newUbahZakatModal" tabindex="-1" aria-labelledby="newUbahZakatLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUbahZakatLabel">Ubah data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/ubahdata'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="kodezakat" id="kodezakat">
                            Nama Muzakki
                            <input type="text" class="form-control mb-3" id="namapezakat" onkeypress="return lettersOnly(event);" name="namapezakat" placeholder="Nama Muzakki" maxlength="50" required>
                            Alamat
                            <input type="text" class="form-control mb-3" id="alamat" name="alamat" placeholder="Alamat" maxlength="50" required>
                            Jumlah Jiwa
                            <input type="text" class="input-element form-control mb-3" id="jumlahjiwa" name="jumlahjiwa" onkeypress="return event.charCode >= 48 && event.charCode <=57" maxlength="3" placeholder="Jumlah Jiwa" required>
                            <div class="form-group row mb-3"">
                                        <div class=" col-md-6 mt-1">
                                Zakat Fitrah (L)
                                <input type="text" onkeyup="findTotal()" class="beras input-element form-control mb-3" name="berupaberas" id="berupaberas" maxlength="5" placeholder="Beras (L)" value="0">
                            </div>
                            <div class="col-md-6 mt-1">
                                Zakat Fitrah (Rp)
                                <input type="text" onkeyup="findTotalUang()" class="uang input-element form-control mb-3" id="berupauang" name="berupauang" placeholder="Uang (Rp)" maxlength="9" value="0">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-6 mt-1">
                                Fidyah (L)
                                <input type="text" onkeyup="findTotal()" class="beras input-element form-control mb-3" class="beras" name="fidyahberas" id="fidyahberas" onkeypress="return isNumberKey(this, event);" maxlength="5" placeholder="Beras (L)" value="0">
                            </div>
                            <div class="col-md-6 mt-1">
                                Fidyah (Rp)
                                <input type="text" onkeyup="findTotalUang()" class="uang input-element  form-control mb-3" id="fidyahuang" name="fidyahuang" placeholder="Uang (Rp)" maxlength="9" value="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mt-1">
                                Infaq (Rp)
                                <input type="text" onkeyup="findTotalUang()" class="uang input-element form-control mb-3" id="infaq" name="infaq" placeholder="Infaq" maxlength="9" value="0">
                            </div>
                            <div class="col-md-6 mt-1">
                                Zakat Mal (Rp)
                                <input type="text" onkeyup="findTotalUang()" class="uang input-element  form-control mb-3" id="zakatmal" name="zakatmal" placeholder="Zakat Mal (Rp)" value="0" maxlength="9">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mt-1">
                                Total Beras (L)
                                <input type="text" id="totalberas" class="input-element form-control mb-3" name="totalberas" placeholder="Beras (L)" value="0" readonly>
                            </div>
                            <div class="col-md-6 mt-1">
                                Total Uang (Rp)
                                <input type="text" id="totaluang" class="input-element form-control mb-3" name="totaluang" placeholder="Uang (Rp)" value="0" readonly>
                            </div>
                        </div>
                        <input type="hidden" id="telahdiubahadmin" name="telahdiubahadmin" value="Ya">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
            </div>
            </form>
        </div>
    </div>






    <!-- Hapus data -->
    <?php foreach ($datapezakat as $dz) : ?>
        <div class="modal fade" id="newHapusDataModal<?= $dz['kodezakat']; ?>" tabindex="-1" role="dialog" aria-labelledby="newHapusDataModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newHapusDataModalLabel">Yakin ingin hapus?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Mau hapus data pezakat atas nama <?= $dz['namapezakat']; ?> ?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-success" href="<?= base_url('admin/hapusdata/'); ?><?= $dz['kodezakat']; ?>">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
</div>