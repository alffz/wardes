<?php

    class tambah extends CI_Controller{
        // jika belum login redirect ke controller login
        public function __construct()
        {
            parent::__construct();
            // jika sesion email gak ada redirect ke login
            $this->load->helper('fungsi');
            $this->load->model('ModelAnggotaKeluarga');
            // jika sesion email gak ada redirect ke login
            // is_logedin();
        }

        public function jalan( $var = null)
        {
               // jika tambah inser gagal balik ke halamn ini
               $this->form_validation->set_rules('jalan','Jalan','required');
               $this->form_validation->set_rules('dusun','Dusun','required');
               if($this->form_validation->run() == FALSE){
               $data['header']     = 'hold-transition sidebar-mini layout-fixed';
               $data['wrapper']    = 'wrapper';
               $data['dusun']      = $this->ModelJalan->getdusun();
               $data['user']   	   = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
               $data['title']      = "Tambah Jalan";
               $this->load->view('header',$data);
               $this->load->view('sidebar');
               $this->load->view('tambah_jalan');
               $this->load->view('footer');
               }
               else{
                   // tambahkan jalan ke database 
                   $this->ModelJalan->tambahjln();
                   // kemudian alihkan ke base home
                   redirect('tambah/jalan');
               }
        }
        // tambah dusun 
        public function Dusun($tingkat= null)
        {   
            
            // jika tambah inser gagal balik ke halamn ini
            $this->form_validation->set_rules('dusun','dusun','required');
            $this->form_validation->set_rules('desa','Desa','required');
            if($this->form_validation->run() == FALSE){
            $data['desa']       = $this->ModelDusun->getdesa();
            $data['dusun']      = $this->ModelDusun->GetDusun();
            $data['user']     	= $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();          
            $this->load->view('header',$data);
            $this->load->view('sidebar');
            $this->load->view('tambah_dusun');
            $this->load->view('footer');
            }
            else{
                // 

                $this->ModelDusun->tambahdsn();
                // alihkan ke base home
                redirect('tambah');
            }
        }


        // gang 
        public function Gang($tingkat= null)
        {   
            
            // jika tambah insert gagal balik ke halamn ini
            $this->form_validation->set_rules('jalan','Jalan','required');
            $this->form_validation->set_rules('gang','Gang','required');
            if($this->form_validation->run() == FALSE){
                $data['header']     = 'hold-transition sidebar-mini layout-fixed';
                $data['wrapper']    = 'wrapper';
                $data['jalan']      = $this->ModelGang->GetJalan();
                $data['dusun']      = $this->ModelGang->GetDusun();
                $data['user']   	= $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
                $data['title']      = "Tambah Gang";
                $this->load->view('header',$data);
                $this->load->view('sidebar');
                $this->load->view('gang');
                $this->load->view('footer');
            }
            else{
                // 
                $this->ModelGang->tambahgang();
                // alihkan ke base home
                redirect('tambah/gang');
            }
        }

        public function IdJalan()
        {
            $id_desa = $this->input->post('dusun');//dari  data{desa:} pada ajax
            // kirim id_desa dan return hasil nya
            echo $this->ModelGang->GetJalan($id_desa);
        }

                // tampilan 
        public function KartuKeluarga($tingkat= null)
        {   
            // $this->load->model('k_keluarga');
            // jika tambah ikartu kelauarga gagal balik ke halamn ini
            $this->form_validation->set_rules('nik','Nik','required');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('dusun','Dusun','required');
            $this->form_validation->set_rules('jalan','Jalan','required');
            $this->form_validation->set_rules('gang','Gang','required');
            $this->form_validation->set_rules('latitude','Latitude');
            $this->form_validation->set_rules('longitude','Longitude');
            if($this->form_validation->run() == FALSE){
                $data   = [
                    'header'    =>  'hold-transition sidebar-mini layout-fixed',
                    'wrapper'   =>  'wrapper',
                    'desa'      => 'Bandar Khalipah',
                    'pos'       => 20371,
                    'desa'      => 3,
                    'kaka'      => $this->ModelKartuKeluarga->dusun(),
                    'jalan'     => $this->ModelKartuKeluarga->getJalan1(),
                    'gang'      => $this->ModelKartuKeluarga->GetGang(),
                    'title'     => "Tambah Kartu Keluarga",
                    'user'  	=> $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array(),
                ];
            $this->load->view('header',$data);
            $this->load->view('sidebar');
            $this->load->view('ViewKartuKeluarga',$data);
            $this->load->view('footer');
            }
            // jika berhasil insert data dan redirect ke home
            else{
                // 
                $this->ModelKartuKeluarga->TambahKartuKeluarga();
                redirect('tambah/kartukeluarga');
            }
        }

        public function ruleAk( $var = null)
        {
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('nik','Nik','required');
            $this->form_validation->set_rules('kelamin','Kelamin','required');
            $this->form_validation->set_rules('tmptlahir','Tempat Lahir','required');
            $this->form_validation->set_rules('tanggal','Tanggal','required');
            $this->form_validation->set_rules('agama','Agama');
            $this->form_validation->set_rules('pendidikan','Pendidikan');
            $this->form_validation->set_rules('pekerjaan','Pekerjaan');
            $this->form_validation->set_rules('status','Status Perkawinan');
            $this->form_validation->set_rules('hubungan','Hubungan');
            $this->form_validation->set_rules('kewarganegaraan','Kewarganegaraan');
            $this->form_validation->set_rules('ayah','Nama Ayah');
            $this->form_validation->set_rules('ibu','Nama Ibu');
        }
        // anggota keluarga
        public function anggotaKeluarga($tingkat= null)
        {   
            // $this->load->model('k_keluarga');
            // jika tambah ikartu kelauarga gagal balik ke halamn ini
            $id_kk      = $this->uri->segment(3);
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('nik','Nik','required');
            $this->form_validation->set_rules('kelamin','Kelamin','required');
            $this->form_validation->set_rules('tmptlahir','Tempat Lahir','required');
            $this->form_validation->set_rules('tanggal','Tanggal','required');
            $this->form_validation->set_rules('agama','Agama');
            $this->form_validation->set_rules('pendidikan','Pendidikan');
            $this->form_validation->set_rules('pekerjaan','Pekerjaan');
            $this->form_validation->set_rules('status','Status Perkawinan');
            $this->form_validation->set_rules('hubungan','Hubungan');
            $this->form_validation->set_rules('kewarganegaraan','Kewarganegaraan');
            $this->form_validation->set_rules('ayah','Nama Ayah');
            $this->form_validation->set_rules('ibu','Nama Ibu');
            if($this->form_validation->run() == FALSE){
                $data   = [
                    'desa'      => 'Bandar Khalipah',
                    'title'     => "Tambah Anggota Keluarga",
                    'user'  	=> $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array(),
                    'pendidikan'=> $this->ModelAnggotaKeluarga->GetPendidikan(),
                    'pekerjaan' => $this->ModelAnggotaKeluarga->GetPekerjaan(),
                    'hubungan'  => $this->ModelAnggotaKeluarga->GetHubungan(),
                ];
            $this->load->view('header',$data);
            $this->load->view('sidebar');
            $this->load->view('tambah_anggotaKeluarga',$data);
            $this->load->view('footer');
            }
            // jika berhasil insert data dan redirect ke home
            else{
                // 
                $this->ModelAnggotaKeluarga->TambahAk();
                redirect('tambah/anggotaKeluarga/'.$id_kk);
            }
        }
         // dusun
        // data ini dikirm ke model
        public function Dusun1()
        {
            // $id_desa = $this->input->post('desa');//dari  data{desa:} pada ajax
            // kirim id_desa dan return hasil nya
            return  $this->ModelKartuKeluarga->GetDusun();
        }

        // jalan
        public function Jalan1()
        {
            $id_desa = $this->input->post('dusun');//dari  data{desa:} pada ajax
            // kirim id_desa dan return hasil nya
            echo $this->ModelKartuKeluarga->GetJalan($id_desa);
        }

        // gang
        public function Gang1()
        {
            $id_jalan = $this->input->post('jalan');
            echo $this->ModelKartuKeluarga->GetGang($id_jalan);
        }

        // data table serverside jalan
        function get_ajax() {
            // jika $user = kadus maka     
            $id_dusun    = $this->input->post('id_dusun');
            $list = $this->ModelJalan->get_datatables($id_dusun);
            // jika $user  = sekdes maka ModelData->get_all_data()        
            $data = array();
            $no = @$_POST['start'];
            foreach ($list as $item) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $item->nama_jalan;
                $row[] = 
                        '<a href="'.base_url('ubah/jalan/'.$item->id_jalan).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
                         <a href="'.base_url('hapus/jalan/'.$item->id_jalan).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
                $data[] = $row;
            }
            $output = array(
                        "draw" => @$_POST['draw'],
                        "recordsTotal" => $this->ModelJalan->count_all(),
                        "recordsFiltered" => $this->ModelJalan->count_filtered(),
                        "data" => $data,
                    );
            // output to json format
            echo json_encode($output);
        }

        // get gang for view
        function get_ajax_gang() {
            $id_dusun = $this->input->post('id_dusun');
            // jika $user = kadus maka     
            $list = $this->ModelGang->get_datatables($id_dusun);
            // jika $user  = sekdes maka ModelData->get_all_data()        
            $data = array();
            $no = @$_POST['start'];
            foreach ($list as $item) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $item->nama_gang;
                $row[] = $item->nama_jalan;
                $row[] = $item->nama_dusun;
                $row[] = 
                        '<a href="'.base_url('ubah/gang/'.$item->id_gang).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
                         <a href="'.base_url('hapus/gang/'.$item->id_gang).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
                $data[] = $row;
            }
            $output = array(
                        "draw" => @$_POST['draw'],
                        "recordsTotal" => $this->ModelGang->count_all(),
                        "recordsFiltered" => $this->ModelGang->count_filtered(),
                        "data" => $data,
                    );
            // output to json format
            echo json_encode($output);
        }
    }

?>