<?php

    class logout extends CI_Controller{

        public function keluar(Type $var = null)
        {
            session_unset();
            $this->session->set_flashdata('pesan','<div class="alert alert-warning" role="alert">
            anda telah logout
          </div>');
            redirect('login');
        }
    }


?>