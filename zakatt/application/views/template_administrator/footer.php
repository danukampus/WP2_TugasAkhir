  <!-- Footer -->
  <footer class="sticky-footer bg-white">
      <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy; <?= date('Y') ?></span>
          </div>
      </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Yakin ingin keluar?</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                  <a class="btn btn-primary" href="<?= (base_url('auth/logout')); ?>">Ya</a>
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>

  <script type="text/javascript" src="DataTables/datatables.min.js"></script>

  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

  <script src="<?= base_url('assets/'); ?>vendor/cleave/cleave.min.js"></script>
  <script src="cleave-phone.{country}.js"></script>

  <script src="<?= base_url('assets/'); ?>vendor/droplist/dist/js/bootstrap-select.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/droplist/dist/js/i18n/defaults-id_ID.min.js"></script>

  <!-- numeral js -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>




  <script>
      $('#newUbahPanitiaModel').on('shown.bs.modal', function() {
          $('#btn-ubahdatapanitia').trigger('focus')
      })
  </script>



  <script>
      $(document).ready(function() {
          $('#tabelpezakat').DataTable({
              dom: 'Bfrtlip',
              buttons: [{
                  extend: 'excel',
                  className: 'btn-success',
                  title: 'Data_Pezakat'
              }, {
                  extend: 'print',
                  className: 'btn-info',
                  title: 'Data_Pezakat'

              }],

          });

      });
  </script>


  <script>
      $(document).ready(function() {
          $('#tabelpezakatuser').DataTable();
      });
  </script>
  <script>
      $(document).ready(function() {
          $('#tabelmustahik').DataTable({
              dom: 'Bfrtlip',
              buttons: [{
                  extend: 'excel',
                  className: 'btn-success',
                  title: 'Data_Mustahik'
              }, {
                  extend: 'print',
                  className: 'btn-info',
                  title: 'Data_Mustahik'

              }],

          });
      });
  </script>


  <script>
      $(document).ready(function() {
          $('#tabelmuzakki').DataTable({
              dom: 'Bfrtlip',
              buttons: [{
                  extend: 'excel',
                  className: 'btn-success',
                  title: 'Data_Muzakki'
              }, {
                  extend: 'print',
                  className: 'btn-info',
                  title: 'Data_Muzakki'

              }],

          });
      });
  </script>
  <script>
      $(document).ready(function() {
          $('#tabelpanitia').DataTable({
              dom: 'Bfrtlip',
              buttons: [{
                  extend: 'excel',
                  className: 'btn-success',
                  title: 'Data_Panitia'
              }, {
                  extend: 'print',
                  className: 'btn-info',
                  title: 'Data_Panitia'

              }],

          });
      });
  </script>
  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script>
      $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
  </script>
  <script>
      $('.form-check-input').on('click', function() {
          const menuId = $(this).data('menu');
          const roleId = $(this).data('role');

          $.ajax({
              url: "<?= base_url('admin/changeaccess'); ?>",
              type: 'post',
              data: {
                  menuId: menuId,
                  roleId: roleId
              },
              success: function() {
                  document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId
              }
          });
      });
  </script>
  <script>
      $(document).on('click', '#btn-tambahdata', function() {
          let namapanitia = $(this).data('namapanitia');
          $('.modal-body #namapanitia').val(namapanitia);
      });
  </script>

  <script>
      $(document).on('click', '#btn-ubahdata', function() {
          let kodezakat = $(this).data('kodezakat');
          let namapezakat = $(this).data('namapezakat');
          let alamat = $(this).data('alamat');
          let jumlahjiwa = $(this).data('jumlahjiwa');
          let berupaberas = $(this).data('berupaberas');
          let berupauang = $(this).data('berupauang');
          let fidyahberas = $(this).data('fidyahberas');
          let fidyahuang = $(this).data('fidyahuang');
          let infaq = $(this).data('infaq');
          let zakatmal = $(this).data('zakatmal');
          let totalberas = $(this).data('totalberas');
          let totaluang = $(this).data('totaluang');
          $('.modal-body #kodezakat').val(kodezakat);
          $('.modal-body #namapezakat').val(namapezakat);
          $('.modal-body #alamat').val(alamat);
          $('.modal-body #jumlahjiwa').val(jumlahjiwa);
          $('.modal-body #berupaberas').val(berupaberas);
          $('.modal-body #berupauang').val(berupauang);
          $('.modal-body #fidyahberas').val(fidyahberas);
          $('.modal-body #fidyahuang').val(fidyahuang);
          $('.modal-body #infaq').val(infaq);
          $('.modal-body #zakatmal').val(zakatmal);
          $('.modal-body #totalberas').val(totalberas);
          $('.modal-body #totaluang').val(totaluang);
      });
  </script>

  <script>
      $(document).on('click', '#btn-ubahdatamuzakki', function() {
          let kodemuzakki = $(this).data('kodemuzakki');
          let namamuzakki = $(this).data('namamuzakki');
          let alamat = $(this).data('alamat');
          let rt = $(this).data('rt');
          let rw = $(this).data('rw');
          let catatan = $(this).data('catatan');
          $('.modal-body #kodemuzakki').val(kodemuzakki);
          $('.modal-body #namamuzakki').val(namamuzakki);
          $('.modal-body #alamat').val(alamat);
          $('.modal-body #rt').val(rt);
          $('.modal-body #rw').val(rw);
          $('.modal-body #catatan').val(catatan);
      });
  </script>

  <script>
      $(document).on('click', '#btn-ubahdatamustahik', function() {
          let kodemustahik = $(this).data('kodemustahik');
          let namamustahik = $(this).data('namamustahik');
          let alamat = $(this).data('alamat');
          let rt = $(this).data('rt');
          let rw = $(this).data('rw');
          let jmlkartukeluarga = $(this).data('jmlkartukeluarga');
          let jmlangkeluarga = $(this).data('jmlangkeluarga');
          let status = $(this).data('status');
          let catatan = $(this).data('catatan');
          $('.modal-body #kodemustahik').val(kodemustahik);
          $('.modal-body #namamustahik').val(namamustahik);
          $('.modal-body #alamat').val(alamat);
          $('.modal-body #rt').val(rt);
          $('.modal-body #rw').val(rw);
          $('.modal-body #jmlkartukeluarga').val(jmlkartukeluarga);
          $('.modal-body #jmlangkeluarga').val(jmlangkeluarga);
          $('.modal-body #status').val(status);
          $('.modal-body #catatan').val(catatan);
      });
  </script>

  <script>
      $(document).on('click', '#btn-ubahdatapanitia', function() {

          let kodepanitia = $(this).data('kodepanitia');
          let tanggal = $(this).data('tanggal');
          let jammasuk = $(this).data('jammasuk');
          let jamakhir = $(this).data('jamakhir');
          let namapanitia = $(this).data('namapanitia');
          let alamat = $(this).data('alamat');
          let nohp = $(this).data('nohp');
          let catatan = $(this).data('catatan');
          $('.modal-body #kodepanitia').val(kodepanitia);
          $('.modal-body #tanggal').val(tanggal);
          $('.modal-body #jammasuk').val(jammasuk);
          $('.modal-body #jamakhir').val(jamakhir);
          $('.modal-body #namapanitia').val(namapanitia);
          $('.modal-body #alamat').val(alamat);
          $('.modal-body #nohp').val(nohp);
          $('.modal-body #catatan').val(catatan);
      });
  </script>

  <script type="text/javascript">
      function isNumberKey(txt, evt) {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode == 46) {
              //Check if the text already contains the . character
              if (txt.value.indexOf('.') === -1) {
                  return true;
              } else {
                  return false;
              }
          } else {
              if (charCode > 31 &&
                  (charCode < 48 || charCode > 57))
                  return false;
          }
          return true;
      }
  </script>



  <script>
      function lettersOnly(evt) {
          evt = (evt) ? evt : event;
          var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
              ((evt.which) ? evt.which : 0));
          if (charCode > 32 && (charCode < 65 || charCode > 90) &&
              (charCode < 97 || charCode > 122)) {

              return false;
          }
          return true;
      }
  </script>
  <script>
      function findTotal() {
          var arr = document.getElementsByClassName('beras');
          var tot = 0;
          for (var i = 0; i < arr.length; i++) {
              if (parseFloat(arr[i].value))

                  tot += parseFloat(arr[i].value);
          }

          document.getElementById('totalberas').value = tot;
      };
      document.addEventListener("DOMContentLoaded", function(event) {
          findTotal();
      });
  </script>

  <script>
      function findTotalUang() {
          var arr = document.getElementsByClassName('uang');
          var tot = 0;
          for (var i = 0; i < arr.length; i++) {
              if (parseFloat(arr[i].value))

                  tot += parseFloat(arr[i].value);
          }

          document.getElementById('totaluang').value = tot;
      };
      document.addEventListener("DOMContentLoaded", function(event) {
          findTotalUang();
      });
  </script>

  <script>
      $('.input-element').toArray().forEach(function(field) {
          new Cleave(field, {
              numeral: true,
              numeralThousandsGroupStyle: 'thousand',
              delimiter: ""

          })

      });
  </script>


  <script>
      const tel = document.getElementById('noponsel');
      tel.addEventListener('input', function() {
          let start = this.selectionStart;
          let end = this.selectionEnd;

          const current = this.value
          const corrected = current.replace(/([^+0-9]+)/gi, '');
          this.value = corrected;

          if (corrected.length < current.length) --end;
          this.setSelectionRange(start, end);
      });
  </script>

  </body>

  </html>