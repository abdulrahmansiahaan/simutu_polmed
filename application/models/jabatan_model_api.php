<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model_api extends CI_Model
{
    public function getJabatan()
    {
        $this->db->select('j.*');
        $this->db->from('jabatan AS j');
        $_jabatan = $this->db->get();
        $jabatan = [];
        if ($_jabatan->num_rows() > 0) {
            $jabatan = $_jabatan->result();
            return $jabatan;
        }
    }
}
