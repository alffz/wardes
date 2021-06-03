<?php

    class test extends CI_Controller{


        public function __construct(Type $var = null)
        {
            parent::__construct();
            $this->load->model('ModelTest');
            $this->load->helper('fungsi');
            // is_logedin();
        }

        public function index(Type $var = null)
        {
            $role_id       = $this->session->userdata('role_id');
            $data['uri']   = $this->uri->segment(1);
            $data['menu']  = $this->ModelTest->get_menu($data['uri']);
            $data['menu']  = $this->db->get_where('user_menu',['menu'=>$data['uri']])->row_array();
            // ambil role_menu dari menu
            $data['role']  = $data['menu']['role_menu'];
            $this->load->view('view_test',$data);


        }

        // test count 
        public function countResult()
        {
            $nik = 10;
            $query = $this->db->query("select * from kartu_keluarga where nik='$nik'");
            $query = $query->num_rows();
            if($query > 0){
                echo "ada";
            }
            else{
                echo"gak ada";
            }
        }

        public function GetDusun(Type $var = null)
        {
            return $this->db->get;
        }
    }

?>