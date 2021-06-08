<?php
    class ModelAnggotaKeluarga extends CI_Model{

        public function tambahAk(Type $var = null)
        {
            $data = [
                'id_ak'             => uniqid(),
                'id_kk'             => $this->uri->segment(3),
                'nama'              => $this->input->post('nama',true),
                'nik'               => $this->input->post('nik',true),
                'kelamin'           => $this->input->post('kelamin',true),
                'tmpt_lahir'        => $this->input->post('tmptlahir',true),
                'tanggal_lahir'     => $this->input->post('tanggalPencatatan'),
                'tanggal_pencatatan'=> $this->input->post('tanggal',true),
                'agama'             => $this->input->post('agama',true),
                'id_pendidikan'     => $this->input->post('pendidikan',true),
                'id_pekerjaan'      => $this->input->post('pekerjaan',true),
                'status_perkawinan' => $this->input->post('status',true),
                'id_hub_keluarga'   => $this->input->post('hubungan',true),
                'kewarganegaraan'   => $this->input->post('Kewarganegaraan',true),
                'NamaAyah'          => $this->input->post('ayah',true),
                'NamaIbu'           => $this->input->post('ibu',true),
            ];
            $this->db->insert('anggota_keluarga',$data);
        }

        public function updateAK(Type $var = null)
        {
            
        }

        public function GetPendidikan()
        {
            return $this->db->query("SELECT * FROM pendidikan")->result();
        
        }
        public function GetPekerjaan()
        {
            return $this->db->query("SELECT * FROM pekerjaan")->result();
        }
        public function GetHubungan()
        {
            return $this->db->query("SELECT * FROM hubungan_keluarga")->result();
        }

    
    // start datatables
    var $column_order = array(null, null,null, 'nama','nik'); //set column field database for datatable orderable
    var $column_search = array('nama','nik', 'agama'); //set column field database for datatable searchable
    var $order = array('nomor_urut' => 'desc'); // default order 
    /*  SELECT dusun.nama_dusun FROM `anggota_keluarga` 
            JOIN kartu_keluarga ON anggota_keluarga.id_kk = kartu_keluarga.id_kk 
            JOIN dusun ON kartu_keluarga.id_dusun = dusun.id_dusun
    */

    private function _get_datatables_query($id) {
        $this->db->select('*');
		$this->db->from('anggota_keluarga');
		// $this->db->join('kartu_keluarga', 'anggota_keluarga.id_kk = kartu_keluarga.id_kk');
        $this->db->where('anggota_keluarga.id_kk',$id);
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables($id_kk) {
        // $id_kk  = '60b20e4fd9853';
        $this->_get_datatables_query($id_kk);
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered($id_kk) {
        // $id_kk  = '60b20e4fd985'; 
        $this->_get_datatables_query($id_kk);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('anggota_keluarga');
        return $this->db->count_all_results();
	}
	// end datatables
    }


?>