<?php

   class Data extends CI_Controller{
    
        // jika belum login redirect ke controller login
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('fungsi');      
            $this->load->model('ModelAnggotaKeluarga');
            // jika sesion email gak ada redirect ke login , is_logedin dibuat di helper
            is_logedin();
        }
        public function index(Type $var = null)
        {
            $data   = [
                'title'     => 'Kartu Keluarga',
                'user'      => $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array()
            ];      
            $this->load->view('header',$data);
            $this->load->view('sidebar',$data);
            $this->load->view('data_penduduk',$data);
            $this->load->view('footer');
            
        }

        public function anggotaKeluarga()
        {

            $data   = [
                'title'     => 'Anggota Keluarga',
                'user'      => $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array(),
            ];      
            $this->load->view('header',$data);
            $this->load->view('sidebar',$data);
            $this->load->view('view_anggota_keluarga',$data);
            $this->load->view('footer');
        }
        
        
        // data kartu keluarga
        function get_ajax() {
            // jika $user = kadus maka     
            $iddusun    = $this->input->post('iddusun');
            $list = $this->ModelKartuKeluarga->get_datatables($iddusun);
            // jika $user  = sekdes maka ModelData->get_all_data()        
            $data = array();
            $no = @$_POST['start'];
            foreach ($list as $item) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = 
                        '   <a href="'.base_url('data/anggotakeluarga/'.$item->id_kk).'" data-toggle="tooltip" data-placement="top" title="Anggota Keluarga" class="btn btn-success btn-xs"><i class="fas fa-user-friends" aria-hidden="true"></i></a>
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
                        "recordsTotal" => $this->ModelKartuKeluarga->count_all(),
                        "recordsFiltered" => $this->ModelKartuKeluarga->count_filtered(),
                        "data" => $data,
                    );
            // output to json format
            echo json_encode($output);
        }
   
        // data anggota keluarga
        function get_ajax_ak() {
            $id_kk  = $this->input->post('idkk');     
            $list = $this->ModelAnggotaKeluarga->get_datatables($id_kk);
            // jika $user  = sekdes maka ModelData->get_all_data()        
            $data = array();
            $no = @$_POST['start'];
            foreach ($list as $item) {
                $no++;
                $row    = array();
                $row[]  = $no;
                $row[]  =   '<a href="'.base_url('ubah/anggotakelauaga/'.$item->id_ak).'"  class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
                            <a href="'.base_url('data/hapusKK/'.$item->id_ak).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>';
                $row[]  = $item->nik;
                $row[]  = $item->nama;
                $row[]  = $item->kelamin;
                $row[]  = $item->id_hub_keluarga;
                $row[]  = $item->tmpt_lahir;        
                $row[]  = $item->tanggal_lahir;  
                $row[]  = $item->tanggal_pencatatan;  
                $row[]  = $item->agama;
                $row[]  = $item->kewarganegaraan;           
                $data[] = $row;
            }
            $output = array(
                        "draw" => @$_POST['draw'],
                        "recordsTotal" => $this->ModelAnggotaKeluarga->count_all(),
                        "recordsFiltered" => $this->ModelAnggotaKeluarga->count_filtered($id_kk),
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
            $this->form_validation->set_rules('idkk','IdKK','required');
            $this->form_validation->set_rules('nik','Nik','required');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('dusun','Dusun','required');
            $this->form_validation->set_rules('jalan','Jalan','required');
            $this->form_validation->set_rules('gang','Gang','required');
            $this->form_validation->set_rules('keterangan','Keterangan');
            $this->form_validation->set_rules('latitude','Latitude');
            $this->form_validation->set_rules('longitude','Longitude');
            if($this->form_validation->run()==false){
                $data   = [
                    'title'     => 'Ubah Kartu Keluarga',
                    'user'      => $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array(),
                    'kk'        => $this->ModelKartuKeluarga->getKk(),
                    'jalan'     => $this->ModelKartuKeluarga->getjalan1(),
                    'gang'      => $this->ModelKartuKeluarga->gang()
                ];      
                $this->load->view('header',$data);
                $this->load->view('sidebar',$data);
                $this->load->view('ubah_kartu_keluarga',$data);
                $this->load->view('footer');
            }else{
                $this->ModelKartuKeluarga->Ubahkk();
                redirect('data');
            }

        }
        
        public function ubahGang()
        {
            $id_jalan  = $this->input->post('jalan');
            // cari gang yang id_dusun = $id_jalan
            $query     = $this->db->query("SELECT * FROM gang WHERE id_jalan='$id_jalan'")->result();

            foreach($query as $q){
                echo '<option value="'.$q->id_gang.'">'.$q->nama_gang.'</option>';
            }
        }
    }

?>