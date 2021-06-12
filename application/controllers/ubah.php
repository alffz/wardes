<?php

    class Ubah extends CI_Controller{

        // jika belum login redirect ke controller login
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('fungsi');      
            $this->load->model('ModelAnggotaKeluarga');
            // jika sesion email gak ada redirect ke login , is_logedin dibuat di helper
            // is_logedin();
        }
        public function anggotakelauaga()
        {
            $this->form_validation->set_rules('nourut','Nomor Urut','required');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('nik','Nik','required');
            $this->form_validation->set_rules('kelamin','Jenis Kelamin','required');
            $this->form_validation->set_rules('tmptlahir','Tempat Lahir','required');
            $this->form_validation->set_rules('tanggal','Tanggal lahir','required');
            $this->form_validation->set_rules('tanggalPencatatan','Tanggal Pencatatan');
            $this->form_validation->set_rules('pendidikan','Pendidikan');
            $this->form_validation->set_rules('pekerjaan','Pekerjaan');
            $this->form_validation->set_rules('status','Status');
            $this->form_validation->set_rules('hubungan','Hubungan');
            $this->form_validation->set_rules('ayah','Nama Ayah');
            $this->form_validation->set_rules('ibu','Nama Ibu');
            if($this->form_validation->run()==false){
                $data   = [
                    'title'             => 'Ubah Anggota Keluarga',
                    'user'              => $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array(),
                    'anggotaKeluarga'   => $this->ModelAnggotaKeluarga->getAk(),
                    'pendidikan'        => $this->ModelAnggotaKeluarga->GetPendidikan(),
                    'pekerjaan'         => $this->ModelAnggotaKeluarga->GetPekerjaan(),
                    'hubungan'          => $this->ModelAnggotaKeluarga->GetHubungan()
                    // 'gang'      => $this->ModelAnggotaKeluarga->gang()
                ];      
                $this->load->view('header',$data);
                $this->load->view('sidebar',$data);
                $this->load->view('ubah_anggota_keluarga',$data);
                $this->load->view('footer');
            }else{
                $this->ModelAnggotaKeluarga->ubahAk();
                redirect('ubah/anggotakelauaga/'.$this->uri->segment(3));
            }

        }

    }

?>