<?php

class model_invoice extends CI_Model{

    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        
        $invoice = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'tgl_pesan' => date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s',mktime(date('H'),
             date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
        );
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach($this->cart->contents() as $item){
            $data = array(
                'id_invoice' => $id_invoice,
                'id_brg'     => $item['id'],
                'nama_brg'  => $item['name'],
                'jumlah'    => $item['qty'],
                'harga'     => $item['price']
            );
            $this->db->insert('tb_pesanan', $data);
        }
        return $id_invoice;
    }

    public function tampil_data()
    {
        $result = $this->db->get('tb_invoice');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }

    public function ambil_id_pesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function get_status($data,$id_invoice)
    {
        $this->db->where('id',$id_invoice);
        $this->db->update('tb_invoice',$data);
        return true;
    }

    public function check_invoice($id_invoice)
    {
        $this->db->where('id',$id_invoice);
        $result = $this->db->get('tb_invoice');
        if($result->num_rows() > 0){
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_pesan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)
                           ->get('tb_pesanan');
        return $result->result();
    }

    public function jum_pending()
    {
        $this->db->where('status','Sedang diproses');
        $this->db->or_where('status','Sedang dikirim');
        $result = $this->db->get('tb_invoice');
        return $result->num_rows();
    }

    public function pendapatan_bulan()
    {
        $bulanIni = date('m');
        $tahunIni = date('Y');
        $this->db->select('*');
        $this->db->from('tb_invoice');
        $this->db->join('tb_pesanan','tb_pesanan.id_invoice = tb_invoice.id');
        $this->db->where('MONTH(tgl_pesan)',$bulanIni);
        $this->db->where('YEAR(tgl_pesan)',$tahunIni);
        $this->db->select_sum('harga');
        $result = $this->db->get()->row();
        return $result->harga;
    }

    public function pendapatan_harian()
    {
        $hariIni = date('d');
        $bulanIni = date('m');
        $tahunIni = date('Y');
        $this->db->select('*');
        $this->db->from('tb_invoice');
        $this->db->join('tb_pesanan','tb_pesanan.id_invoice = tb_invoice.id');
        $this->db->where('DAY(tgl_pesan)',$hariIni);
        $this->db->where('MONTH(tgl_pesan)',$bulanIni);
        $this->db->where('YEAR(tgl_pesan)',$tahunIni);
        $this->db->select_sum('harga');
        $result = $this->db->get()->row();
        return $result->harga;
    }

    public function chart_barang_populer()
    {
        $this->db->select('nama_brg,SUM(jumlah) as total');
        $this->db->group_by('nama_brg');
        $this->db->order_by('total','desc');
        $this->db->from('tb_pesanan');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result();
        
    }

    // public function chart_bulan()
    // {
    //   $this->db->select('tgl_pesan,SUM(jumlah) as total');
    //   $this->db->group_by('MONTH(tgl_pesan)');
    //   $this->db->order_by('MONTH(tgl_pesan)','asc');
    //   $this->db->from('tb_invoice');
    //   $this->db->join('tb_pesanan','tb_pesanan.id_invoice = tb_invoice.id');
    //   $query = $this->db->get();
    //   return $query->result(); 
    // }

    public function chart_bulan($bulan)
    {
      $this->db->where('MONTH(tgl_pesan)',$bulan);
      $this->db->select('SUM(jumlah) as total');
      $this->db->group_by('MONTH(tgl_pesan)');
      $this->db->from('tb_invoice');
      $this->db->join('tb_pesanan','tb_pesanan.id_invoice = tb_invoice.id');
      $query = $this->db->get();
      if($query->num_rows() > 0){
        return $query->row()->total;
      }else{
        return 0;
      }
    }
}