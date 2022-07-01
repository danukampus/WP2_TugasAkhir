<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        is_admin();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template_administrator/header', $data);
        $this->load->view('template_administrator/sidebar', $data);
        $this->load->view('template_administrator/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template_administrator/footer',);
    }
    public function role()
    {
        $data['title'] = 'Hak Akses';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('template_administrator/header', $data);
        $this->load->view('template_administrator/sidebar', $data);
        $this->load->view('template_administrator/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('template_administrator/footer',);
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Pengaturan Hak Akses';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('template_administrator/header', $data);
        $this->load->view('template_administrator/sidebar', $data);
        $this->load->view('template_administrator/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('template_administrator/footer',);
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hak Akses berhasil diubah.</div>');
    }
    public function muzakki()
    {
        $data['title'] = 'Data Muzakki';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['datamuzakki'] = $this->db->get('datamuzakki')->result_array();

        $this->form_validation->set_rules('namamuzakki', 'namamuzakki', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('rt', 'rt', 'required');
        $this->form_validation->set_rules('rw', 'rw', 'required');
        $this->form_validation->set_rules('catatan', 'catatan');
        if ($this->form_validation->run() == false) {


            $this->load->view('template_administrator/header', $data);
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('template_administrator/topbar', $data);
            $this->load->view('admin/muzakki', $data);
            $this->load->view('template_administrator/footer',);
        } else {
            $data = [
                'namamuzakki' => $this->input->post('namamuzakki'),
                'alamat' => $this->input->post('alamat'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->db->insert('datamuzakki', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambahkan.</div>');
            redirect('admin/muzakki');
        }
    }

    public function ubahdatamuzakki()
    {
        $kodemuzakki = $this->input->post('kodemuzakki');
        $namamuzakki =  $this->input->post('namamuzakki');
        $alamat = $this->input->post('alamat');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $catatan = $this->input->post('catatan');

        if (preg_match('#[0-9]#', $namamuzakki)) {
            $this->session->set_flashdata('message', '<div class="error" data-flashdata="Angka tidak diizinkan pada input nama!"></div>');
            redirect('admin/muzakki');
        } else {

            $this->db->set('namamuzakki', $namamuzakki);
            $this->db->set('alamat', $alamat);
            $this->db->set('rt', $rt);
            $this->db->set('rw', $rw);
            $this->db->set('catatan', $catatan);
            $this->db->where('kodemuzakki', $kodemuzakki);
            $this->db->update('datamuzakki');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diubah.</div>');
            redirect('admin/muzakki');
        }
    }

    public function hapusdatamuzakki($kodemuzakki)
    {
        $this->db->where('kodemuzakki', $kodemuzakki);
        $this->db->delete('datamuzakki');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
        redirect('admin/muzakki');
    }
    public function mustahik()
    {
        $data['title'] = 'Data Mustahik';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['datamustahik'] = $this->db->get('datamustahik')->result_array();

        $this->form_validation->set_rules('namamustahik', 'namamustahik', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('rt', 'rt', 'required');
        $this->form_validation->set_rules('rw', 'rw', 'required');
        $this->form_validation->set_rules('jmlkartukeluarga', 'jmlkartukeluarga', 'required');
        $this->form_validation->set_rules('jmlangkeluarga', 'jmlangkeluarga', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_rules('catatan', 'catatan');
        if ($this->form_validation->run() == false) {


            $this->load->view('template_administrator/header', $data);
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('template_administrator/topbar', $data);
            $this->load->view('admin/mustahik', $data);
            $this->load->view('template_administrator/footer',);
        } else {
            $data = [
                'namamustahik' => $this->input->post('namamustahik'),
                'alamat' => $this->input->post('alamat'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'jmlkartukeluarga' => $this->input->post('jmlkartukeluarga'),
                'jmlangkeluarga' => $this->input->post('jmlangkeluarga'),
                'status' => $this->input->post('status'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->db->insert('datamustahik', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambahkan.</div>');
            redirect('admin/mustahik');
        }
    }

    public function ubahdatamustahik()
    {
        $kodemustahik = $this->input->post('kodemustahik');
        $namamustahik =  $this->input->post('namamustahik');
        $alamat = $this->input->post('alamat');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $jmlkartukeluarga = $this->input->post('jmlkartukeluarga');
        $jmlangkeluarga = $this->input->post('jmlangkeluarga');
        $status = $this->input->post('status');
        $catatan = $this->input->post('catatan');

        if (preg_match('#[0-9]#', $namamustahik)) {
            $this->session->set_flashdata('message', '<div class="error" data-flashdata="Angka tidak diizinkan pada input nama!"></div>');
            redirect('admin/mustahik');
        } else {

            $this->db->set('namamustahik', $namamustahik);
            $this->db->set('alamat', $alamat);
            $this->db->set('rt', $rt);
            $this->db->set('rw', $rw);
            $this->db->set('jmlkartukeluarga', $jmlkartukeluarga);
            $this->db->set('jmlangkeluarga', $jmlangkeluarga);
            $this->db->set('status', $status);
            $this->db->set('catatan', $catatan);
            $this->db->where('kodemustahik', $kodemustahik);
            $this->db->update('datamustahik');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diubah.</div>');
            redirect('admin/mustahik');
        }
    }

    public function hapusdatamustahik($kodemustahik)
    {
        $this->db->where('kodemustahik', $kodemustahik);
        $this->db->delete('datamustahik');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
        redirect('admin/mustahik');
    }
    public function panitia()
    {
        $data['title'] = 'Data Panitia';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['datapanitia'] = $this->db->get('datapanitia')->result_array();
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('jammasuk', 'jammasuk', 'required');
        $this->form_validation->set_rules('jamakhir', 'jamakhir', 'required');
        $this->form_validation->set_rules('namapanitia', 'namapanitia', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nohp', 'nohp', 'required');
        $this->form_validation->set_rules('catatan', 'catatan');
        if ($this->form_validation->run() == false) {


            $this->load->view('template_administrator/header', $data);
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('template_administrator/topbar', $data);
            $this->load->view('admin/panitia', $data);
            $this->load->view('template_administrator/footer',);
        } else {
            $data = [
                'tanggal' => $this->input->post('tanggal'),
                'jammasuk' => $this->input->post('jammasuk'),
                'jamakhir' => $this->input->post('jamakhir'),
                'namapanitia' => $this->input->post('namapanitia'),
                'alamat' => $this->input->post('alamat'),
                'nohp' => $this->input->post('nohp'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->db->insert('datapanitia', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambahkan.</div>');
            redirect('admin/panitia');
        }
    }

    public function ubahdatapanitia()
    {
        $kodepanitia = $this->input->post('kodepanitia');
        $tanggal = $this->input->post('tanggal');
        $jammasuk = $this->input->post('jammasuk');
        $jamakhir = $this->input->post('jamakhir');
        $namapanitia =  $this->input->post('namapanitia');
        $alamat = $this->input->post('alamat');
        $nohp = $this->input->post('nohp');
        $catatan = $this->input->post('catatan');

        if (preg_match('#[0-9]#', $namapanitia)) {
            $this->session->set_flashdata('message', '<div class="error" data-flashdata="Angka tidak diizinkan pada input nama!"></div>');
            redirect('admin/panitia');
        } else {
            $this->db->set('tanggal', $tanggal);
            $this->db->set('jammasuk', $jammasuk);
            $this->db->set('jamakhir', $jamakhir);
            $this->db->set('namapanitia', $namapanitia);
            $this->db->set('alamat', $alamat);
            $this->db->set('nohp', $nohp);
            $this->db->set('catatan', $catatan);
            $this->db->where('kodepanitia', $kodepanitia);
            $this->db->update('datapanitia');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diubah.</div>');
            redirect('admin/panitia');
        }
    }

    public function hapusdatapanitia($kodepanitia)
    {
        $this->db->where('kodepanitia', $kodepanitia);
        $this->db->delete('datapanitia');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
        redirect('admin/panitia');
    }
    public function zakat()
    {
        $data['title'] = 'Data Muzakki ';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['datazakat'] = $this->datapezakat_model->getpanitia();
        $data['datapezakat'] = $this->db->get('datapezakat')->result_array();
        $data['panitia'] = $this->db->get('datapanitia')->result_array();


        $this->form_validation->set_rules('namapezakat', 'namapezakat', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('jumlahjiwa', 'jumlahjiwa', 'required');
        $this->form_validation->set_rules('berupaberas', 'berupaberas');
        $this->form_validation->set_rules('berupauang', 'berupauang');
        $this->form_validation->set_rules('fidyahberas', 'fidyahberas');
        $this->form_validation->set_rules('fidyahuang', 'fidyahuang');
        $this->form_validation->set_rules('infaq', 'infaq');
        $this->form_validation->set_rules('shodaqoh', 'shodaqoh');
        $this->form_validation->set_rules('totalberas', 'totalberas');
        $this->form_validation->set_rules('totaluang', 'totaluang');
        $this->form_validation->set_rules('panitiajaga', 'panitiajaga');
        $this->form_validation->set_rules('panitiajaga2', 'panitiajaga2');
        if ($this->form_validation->run() == false) {


            $this->load->view('template_administrator/header', $data);
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('template_administrator/topbar', $data);
            $this->load->view('admin/zakat', $data);
            $this->load->view('template_administrator/footer',);
        } else {
            $data = [
                'namapezakat' => $this->input->post('namapezakat'),
                'alamat' => $this->input->post('alamat'),
                'jumlahjiwa' => $this->input->post('jumlahjiwa'),
                'berupaberas' => $this->input->post('berupaberas'),
                'berupauang' => $this->input->post('berupauang'),
                'fidyahberas' => $this->input->post('fidyahberas'),
                'fidyahuang' => $this->input->post('fidyahuang'),
                'infaq' => $this->input->post('infaq'),
                'zakatmal' => $this->input->post('zakatmal'),
                'totalberas' => $this->input->post('totalberas'),
                'totaluang' => $this->input->post('totaluang'),
                'panitiajaga' => $this->input->post('panitiajaga'),
                'panitiajaga2' => $this->input->post('panitiajaga2')
            ];

            $this->db->insert('datapezakat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.</div>');
            redirect('admin/zakat');
        }
    }

    public function ubahdata()
    {
        $kodezakat = $this->input->post('kodezakat');
        $namapezakat =  $this->input->post('namapezakat');
        $alamat = $this->input->post('alamat');
        $jumlahjiwa = $this->input->post('jumlahjiwa');
        $berupaberas = $this->input->post('berupaberas');
        $berupauang = $this->input->post('berupauang');
        $fidyahberas = $this->input->post('fidyahberas');
        $fidyahuang = $this->input->post('fidyahuang');
        $infaq = $this->input->post('infaq');
        $zakatmal = $this->input->post('zakatmal');
        $totalberas = $this->input->post('totalberas');
        $totaluang = $this->input->post('totaluang');
        $telahdiubahadmin = $this->input->post('telahdiubahadmin');


        if (preg_match('#[0-9]#', $namapezakat)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" data-flashdata="Angka tidak diizinkan pada input nama!"></div>');
            redirect('admin/zakat');
        } else {
            $this->db->set('namapezakat', $namapezakat);
            $this->db->set('alamat', $alamat);
            $this->db->set('jumlahjiwa', $jumlahjiwa);
            $this->db->set('berupaberas', $berupaberas);
            $this->db->set('berupauang', $berupauang);
            $this->db->set('fidyahberas', $fidyahberas);
            $this->db->set('fidyahuang', $fidyahuang);
            $this->db->set('infaq', $infaq);
            $this->db->set('zakatmal', $zakatmal);

            $this->db->set('totalberas', $totalberas);
            $this->db->set('totaluang', $totaluang);
            $this->db->set('telahdiubahadmin', $telahdiubahadmin);
            $this->db->where('kodezakat', $kodezakat);
            $this->db->update('datapezakat');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil diubah</div>');
            redirect('admin/zakat');
        }
    }
    public function hapusdata($kodezakat)
    {
        $this->db->where('kodezakat', $kodezakat);
        $this->db->delete('datapezakat');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
        redirect('admin/zakat');
    }
}
