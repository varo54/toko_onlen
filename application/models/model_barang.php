<?php

class model_barang extends CI_Model{

    public function tampil_data(){
        return $this->db->get('tb_barang');
    }

    public function tambah_barang($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function edit_barang($where,$table){

        return $this->db->get_where($table,$where);

    }

    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('id_brg',$id)->limit(1)->get('tb_barang');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg',$id_brg)->get('tb_barang');

        if($result->num_rows() > 0)
        {
            return $result->row();
        }else{
            return false;
        }
    }

    public function cari_gambar($id)
    {
        $result = $this->db->where('id_brg',$id)->get('tb_barang');
        if($result->num_rows() > 0)
        {
            return $result->row();
        }else{
            return false;
        }
    }

    public function search_barang($brg)
    {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->like('nama_brg',$brg);
        return $this->db->get()->result();
    }
}

?>
