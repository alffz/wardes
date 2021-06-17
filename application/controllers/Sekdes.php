<?php

    class Sekdes extends CI_Controller{


        // jika belum login redirect ke controller login
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('fungsi');  
            $this->load->model('User');          
            // jika sesion email gak ada redirect ke login , is_logedin dibuat di helper
            is_logedin();
        }

        
        public function index(Type $var = null)
        {
            // cek user yg masuk siapa dan apa hak aksesnya
            // select * from user where user.email = this->session->userdata('email')
            $data   = [
                'title'     => 'Sekdes',
                'user'      => $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array()
            ];
            $this->load->view('header',$data);
            $this->load->view('sidebar',$data);
            $this->load->view('view_sekdes',$data);
            $this->load->view('footer');
        }

        public function hakAkses(Type $var = null)
        {
            $data   = [
                'title'     => 'Sekdes',
                'user'      => $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array(),
                'role'      => $this->db->get_where('user_menu',"role_menu='2' OR role_menu='3'")->result_array(),
            ];
            $this->load->view('header',$data);
            $this->load->view('sidebar',$data);
            $this->load->view('view_hakAkses',$data);
            $this->load->view('footer');
        }

        public function rolehakAkses($role_id=null)
        {   
            // $role_id        = $this->session->userdata('role_id');
            $data   = [
                'title'     => 'Sekdes',
                'user'      => $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array(),
                'role'      => $this->db->get_where('user_menu',['role_menu'=>$role_id])->row_array(),
                'menu'      => $this->db->get_Where('user_menu',['role_menu !='=>1])->result_array(),
            ];
            $this->load->view('header',$data);
            $this->load->view('sidebar',$data);
            $this->load->view('view_rolehakAkses',$data);
            $this->load->view('footer');
        }

        public function ubahaksesmenu()
        {
            // dikirim dari view_rolehakakses melalui ajax
            $role   = $this->input->post('role_menu');
            $menu   = $this->input->post('menu');

            $data =[
                'role_access'  => $role,
                'role_menu'     => $menu,
            ];
            // cari dari user_access_menu yang role_access  = $role dan role_menu = $menu
            $hasil = $this->db->get_where('user_access_menu',$data);

            // jika datanya ada maka hapus jika gak ada delet
            if($hasil->num_rows()>0){
                $this->db->delete('user_access_menu',$data);
            }
            else{
                $this->db->insert('user_access_menu',$data);
            }
        } 

        public function kadus(Type $var = null)
        {
            $data   = [
                'title'     => 'Sekdes',
                'user'      => $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array()
            ];
            if($this->form_validation->run() == FALSE){

            $data['kadus']  = $this->User->Getuser();  
            $data['dusun']  = $this->User->Getdusun();          
            $this->load->view('header',$data);
            $this->load->view('sidebar',$data);
            $this->load->view('view_kadus',$data);
            $this->load->view('footer');
            }
        }
        
        public function getdusun()
        {
            return $dusun = $this->db->query('SELECT * FROM dusun')->result_array();
        }

        public function UbahDusun(Type $var = null)
        {
            $this->db->set('id_dusun',$this->input->post('ubahdusun'));
            $this->db->where('id_user', $this->input->post('id_user'));
            $this->db->update('user');


        }

        public function hapusUser()
        {
            return $this->User->hapus();
        }
    }

        

?>