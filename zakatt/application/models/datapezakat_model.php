<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Datapezakat_model extends CI_Model
{
    public function getpanitia()
    {
        $query = "SELECT `datapezakat`.*,`datapanitia`.`namapanitia`
                    FROM `datapezakat` JOIN `datapanitia`
                    ON `datapezakat`.`panitiajaga`=`datapanitia`.`kodepanitia`
                    ";
        return $this->db->query($query)->result_array();
    }
}
