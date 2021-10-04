<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
    public function listJabatan()
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

    public function detailJabatan($id)
    {
        $this->db->select('j.*');
        $this->db->from('jabatan AS j');
        $this->db->where('id', $id);
        $_jabatan = $this->db->get();
        $jabatan = [];
        if ($_jabatan->num_rows() > 0) {
            $jabatan = $_jabatan->result();
            return $jabatan;
        }
    }

    public function storeJabatan($data)
    {
        $this->db->insert('jabatan', $data);
        return $this->db->affected_rows();
    }

    public function updateJabatan($data, $id)
    {
        $this->db->update('jabatan', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function deleteJabatan($id)
    {
        $this->db->delete('jabatan', ['id' => $id]);
        return $this->db->affected_rows();
    }
}
