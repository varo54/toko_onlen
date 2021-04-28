<?php

class Model_kategoris extends CI_Model{

    public function data_elektronik()
    {
        return $this->db->get_where('tb_barang',array('Kategoris' => 'elektronik'));
    }

    public function data_pakaian_pria()
    {
        return $this->db->get_where('tb_barang',array('Kategoris' => 'pakaian pria'));
    }

    public function data_pakaian_wanita()
    {
        return $this->db->get_where('tb_barang',array('Kategoris' => 'pakaian wanita'));
    }

    public function data_pakaian_anak_anak()
    {
        return $this->db->get_where('tb_barang',array('Kategoris' => 'pakaian anak anak'));
    }

    public function data_peralatan_olahraga()
    {
        return $this->db->get_where('tb_barang',array('Kategoris' => 'peralatan olahraga'));
    }
}