<?php

   class Data extends CI_Controller{
    
        // jika belum login redirect ke controller login
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('fungsi');      
            // jika sesion email gak ada redirect ke login , is_logedin dibuat di helper
            is_logedin();
        }
        public function index(Type $var = null)
        {
            // 
        }
        public function Penduduk(Type $var = null)
        {
            $data   = [
                'title'     => 'Sekdes',
                'user'      => $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array()
            ];      
            $this->load->view('header',$data);
            $this->load->view('sidebar',$data);
            $this->load->view('data_penduduk',$data);
            $this->load->view('footer');
            
        }
        
        
        function get_ajax() {
            // jika $user = kadus maka     
            $list = $this->ModelData->get_datatables();
            // jika $user  = sekdes maka ModelData->get_all_data()        
            $data = array();
            $no = @$_POST['start'];
            foreach ($list as $item) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = 
                        '   <a href="'.base_url('tambah/anggotakeluarga/'.$item->id_kk).'" class="btn btn-success btn-xs"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
                            <a href="'.base_url('data/ubah/'.$item->id_kk).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
                            <a href="'.base_url('data/hapusKK/'.$item->id_kk).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
                $row[] = $item->nik;
                $row[] = $item->nama_kk;
                $row[] = $item->nama_dusun;
                $row[] = $item->nama_jalan;
                $row[] = $item->nama_gang;               
                $data[] = $row;
            }
            $output = array(
                        "draw" => @$_POST['draw'],
                        "recordsTotal" => $this->ModelData->count_all(),
                        "recordsFiltered" => $this->ModelData->count_filtered(),
                        "data" => $data,
                    );
            // output to json format
            echo json_encode($output);
        }
   
        public function hapusKK()
        {
            $id     = $this->uri->segment(3);
            // hapus berdasarkan $id
            $this->db->delete('kartu_keluarga',array('id_kk'=>$id));
            redirect('data/penduduk');

        }

        public function Ubah()
        {
            $data   = [
                'title'     => 'Sekdes',
                'user'      => $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array()
            ];      
            $this->load->view('header',$data);
            $this->load->view('sidebar',$data);
            $this->load->view('ubah_data_penduduk',$data);
            $this->load->view('footer');
        }
    }

?>