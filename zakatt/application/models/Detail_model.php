<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_model extends CI_Model
{

    public function gethapusdata($kodezakat)
    {
        $this->db->where('kodezakat', $kodezakat);
        $this->db->delete('datapezakat');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">berhasil dihapus!</div>');
        redirect('user');
    }
    public function getubahDetail($kodezakat)
    {
        // var_dump($this->db->get_where('user_detail', ['id' => $id])->row_array());
        return $this->db->get_where('datapezakat', ['kodezakat' => $kodezakat])->row_array();
    }
}
