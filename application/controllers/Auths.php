<?php 

class Auths extends CI_Controller {

    public function login()
    {

        
        $this->form_validation->set_rules('username','Username','required',['required' => 'Username wajib diisi']);
        $this->form_validation->set_rules('password','Username','required',['password' => 'password wajib diisi']);
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('form_login');
            $this->load->view('templates/footer');
            
        }else{
            $Auths = $this->Model_auths->cek_login();

            if($Auths == FALSE)
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau password anda salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Auths/login');
            }else{
                $this->session->set_userdata('username',$Auths->username);
                $this->session->set_userdata('role_id',$Auths->role_id);

                switch($Auths->role_id){
                    case 1 : redirect('admin/Dashboard_admins');
                    break;
                    case 2 : redirect('welcome');
                    break;
                    default : break;
                }
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Auths/login');
    }
}