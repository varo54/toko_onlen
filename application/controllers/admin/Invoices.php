<?php 
 class Invoices extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('role_id') != '1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('Auths/login');
        }

       
    }

     public function index()
     {
         $data['Invoices'] = $this->Model_invoices->tampil_data();
         $this->load->view('templates_admin/header');
         $this->load->view('templates_admin/sidebar');
         $this->load->view('admin/Invoices',$data);
         $this->load->view('templates_admin/footer');
     }

     public function detail($id_invoice)
     {
        $data['Invoices'] = $this->Model_invoices->ambil_id_invoice($id_invoice);

        $data['pesanan'] = $this->Model_invoices->ambil_id_pesanan($id_invoice);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice',$data);
        $this->load->view('templates_admin/footer');
     }

     public function status($kondisi,$id_invoice)
     {
        if($kondisi == 'proses')
        {
            $data = array(
                'status' => 'Sedang diproses'
            );
            $this->Model_invoices->get_status($data,$id_invoice);
            redirect('admin/Invoices/detail/'.$id_invoice, 'refresh');
        }

        else if($kondisi == 'kirim')
        {
            $data = array(
                'status' => 'Sedang dikirim'
            );
            $this->Model_invoices->get_status($data,$id_invoice);
            redirect('admin/Invoices/detail/'.$id_invoice, 'refresh');
        }

        else if($kondisi == 'sampai')
        {
            $data = array(
                'status' => 'Telah sampai'
            );
            $this->Model_invoices->get_status($data,$id_invoice);
            redirect('admin/Invoices/detail/'.$id_invoice, 'refresh');
        }

        else{

        }
     }
 }