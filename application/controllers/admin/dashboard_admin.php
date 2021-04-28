<?php

class dashboard_admin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('role_id') != '1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/login');
        }

        
    }

    public function index(){
        $data['pending'] = $this->Model_invoice->jum_pending();
        $data['pendapatan_bulan'] = $this->Model_invoice->pendapatan_bulan();
        $data['pendapatan_hari'] = $this->Model_invoice->pendapatan_harian();
        $data['chart_barang'] = $this->Model_invoice->chart_barang_populer();    
        for($i=1; $i <= 12; $i = $i)
        {
            if($i < 10)
            {
            $data['chart_bulan'.$i] = $this->Model_invoice->chart_bulan('0'.$i);
            $i++;
            }
            else
            {
            $data['chart_bulan'.$i] = $this->Model_invoice->chart_bulan($i);
            $i++; 
            }
            
        }
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('templates_admin/footer');
    }
}