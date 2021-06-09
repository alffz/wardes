<?php

    class login extends CI_Controller{

        // index
        // jika belum login redirect ke controller login
        public function __construct()
        {
            parent::__construct();
            // jika sesion email gak ada redirect ke login
            $this->load->helper('fungsi');
            is_logout();
            
        }
        public function index()
        {
            $this->form_validation->set_rules("email","Email","required",[
                'required'  => 'Kolom email wajib diisi'
            ]);
            $this->form_validation->set_rules("password","Password","required",[
                'required'  => 'Kolom Password wajib diisi'
            ]);

            if($this->form_validation->run() == false){
                
                $this->load->view("view_login");
            }
            else{
                $this->masuk();
            }
            
        }

        // login
        public function masuk(Type $var = null)
        {
            $email      = $this->input->post("email",true);
            $password   = $this->input->post("password",true);

            // cari user berdasarkan email dan password diatas
            $user   = $this->db->get_where('user', ['email' => $email])->row_array();
            
            // jika user ada 
            if($user){
                if($password == $user['password']){
                    $data   = [
                        'email'     => $user['email'],
                        'role_id'   => $user['role_id'], // user['role_id']
                        'is_active' => $user['is_active']
                    ];
                    // buat session berdasarkan $data
                    $this->session->set_userdata($data);
                    // jika role_id == 1 maka redirect ke sekdes
                    
                  if($user['role_id']==1){                    
                    redirect('data');
                  }
                  elseif($user['role_id']==2){
                      redirect('data');
                  }
                  else{
                    redirect('data');
                  }
                }
                else{
                    $this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">
                    Password salah
                  </div>');
                    redirect('login');
                }
            }
            else{
                $this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">
                Email tidak terdaftar
              </div>');
                redirect('login');
            }
        }
    }

?>