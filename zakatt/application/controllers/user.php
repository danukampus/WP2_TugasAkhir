<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Detail_model');
        $this->load->model('datapezakat_model');
    }
    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template_administrator/header', $data);
        $this->load->view('template_administrator/sidebar', $data);
        $this->load->view('template_administrator/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template_administrator/footer',);
    }

  
    public function datapezakat()
    {
        $data['title'] = 'Catat Muzakki';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['datapezakat'] = $this->db->get('datapezakat')->result_array();
        $data['datazakat'] = $this->datapezakat_model->getpanitia();
        $data['panitia'] = $this->db->get('datapanitia')->result_array();

        $this->form_validation->set_rules('namapezakat', 'namapezakat', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('jumlahjiwa', 'jumlahjiwa', 'required');
        $this->form_validation->set_rules('berupaberas', 'berupaberas');
        $this->form_validation->set_rules('berupauang', 'berupauang');
        $this->form_validation->set_rules('fidyahberas', 'fidyahberas');
        $this->form_validation->set_rules('fidyahuang', 'fidyahuang');
        $this->form_validation->set_rules('infaq', 'infaq');
        $this->form_validation->set_rules('zakatmal', 'zakatmal');

        $this->form_validation->set_rules('totalberas', 'totalberas');
        $this->form_validation->set_rules('totaluang', 'totaluang');
        $this->form_validation->set_rules('panitiajaga', 'panitiajaga');
        $this->form_validation->set_rules('panitiajaga2', 'panitiajaga2');
        if ($this->form_validation->run() == false) {


            $this->load->view('template_administrator/header', $data);
            $this->load->view('template_administrator/sidebar', $data);
            $this->load->view('template_administrator/topbar', $data);
            $this->load->view('user/datapezakat', $data);
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
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambahkan.</div>');
            redirect('user/datapezakat');
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
        $shodaqoh = $this->input->post('shodaqoh');
        $totalberas = $this->input->post('totalberas');
        $totaluang = $this->input->post('totaluang');



        $this->db->set('namapezakat', $namapezakat);
        $this->db->set('alamat', $alamat);
        $this->db->set('jumlahjiwa', $jumlahjiwa);
        $this->db->set('berupaberas', $berupaberas);
        $this->db->set('berupauang', $berupauang);
        $this->db->set('fidyahberas', $fidyahberas);
        $this->db->set('fidyahuang', $fidyahuang);
        $this->db->set('infaq', $infaq);
        $this->db->set('shodaqoh', $shodaqoh);
        $this->db->set('totalberas', $totalberas);
        $this->db->set('totaluang', $totaluang);
        $this->db->where('kodezakat', $kodezakat);
        $this->db->update('datapezakat');
        $this->session->set_flashdata('message', '<div class="sukses" data-flashdata="Data barang berhasil diubah!"></div>');
        redirect('user/datapezakat');
    }

    public function hapusdata($kodezakat)
    {
        $this->db->where('kodezakat', $kodezakat);
        $this->db->delete('datapezakat');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus!</div>');
        redirect('user/datapezakat');
    }
}