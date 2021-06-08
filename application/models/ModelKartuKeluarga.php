<?php

    
    class ModelKartuKeluarga extends CI_Model{
        
        public function GetDusun($val='')
        {
            $this->db->order_by('nama_dusun');
            return $this->db->get('dusun')->result();
        }
        // get jalan
        public function GetJalan($val='')
        {
            // pilih jalan yg id_dusunnya $val
            $this->db->where('id_dusun',$val);
            $this->db->order_by('nama_jalan','asc');
            $query  = $this->db->get('jalan')->result();            
            echo '<option> Pilih Jalan </option>';
            foreach($query as $row){
                echo '<option value="'.$row->id_jalan.'">'.$row->nama_jalan.'</option>';
            }
        }
        // get gang
        public function GetGang($val='')
        {
            $this->db->where('id_jalan',$val);
            $this->db->order_by('nama_gang','asc');
            $query = $this->db->get('gang')->result();            
            echo '<option> Pilih Gang </option>';
            foreach($query as $row){
                echo '<option value="'.$row->id_gang.'">'.$row->nama_gang.'</option>';
            }
        }

        // insert data kartu keluarga
        public function TambahKartuKeluarga(Type $var = null)
        {
            // insert jika NIK belum ada 
            $nik   = $this->input->post('nik');
            $query = $this->db->query("select * from kartu_keluarga where nik='$nik'");
            $query = $query->num_rows();
            if($query > 0){
                
                $this->session->set_flashdata('nik','<div class="alert alert-warning" role="alert">NIK telah ada </div>');
                redirect('tambah/kartukeluarga');
            }
            else
            {
                $data   = [
                    'id_kk'     => uniqid(),
                    'nik'       => $this->input->post('nik',true),
                    'nama_kk'   => $this->input->post('nama',true),
                    'id_desa'   => $this->input->post('desa',true),
                    'id_dusun'  => $this->input->post('dusun',true),
                    'id_jalan'  => $this->input->post('jalan',true),
                    'id_gang'   => $this->input->post('gang',true),
                    'Latitude'  => $this->input->post('latitude',true),
                    'longitude' => $this->input->post('longitude',true),
                    'date'      => $this->input->post('time'),
                    'waktu'     => time(),
                    'pengisi'   => $this->input->post('user',true),
                    'keterangan'=> $this->input->post('keterangan',true)
                ];
                $this->db->insert('kartu_keluarga',$data);
                $this->session->unset_userdata('pesan');;
            }            
        }
           
    // start datatables
    var $column_order = array(null, null, 'nama_kk','nama_dusun','nama_jalan','nama_gang'); //set column field database for datatable orderable
    var $column_search = array('nik','nama_kk', 'nama_dusun','nama_jalan','nama_gang'); //set column field database for datatable searchable
    var $order = array('waktu' => 'desc'); // default order 
    /*  SELECT dusun.nama_dusun FROM `anggota_keluarga` 
            JOIN kartu_keluarga ON anggota_keluarga.id_kk = kartu_keluarga.id_kk 
            JOIN dusun ON kartu_keluarga.id_dusun = dusun.id_dusun
    */

    private function _get_datatables_query($iddusun) {
        $this->db->select('*');
		$this->db->from('kartu_keluarga');
		$this->db->join('dusun', 'kartu_keluarga.id_dusun = dusun.id_dusun');
		$this->db->join('jalan', 'kartu_keluarga.id_jalan = jalan.id_jalan');
        $this->db->join('gang', 'kartu_keluarga.id_gang = gang.id_gang');
        $this->db->where('kartu_keluarga.id_dusun',$iddusun);
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
    function get_datatables($iddusun) {
        $id = $iddusun;
        $this->_get_datatables_query($id);
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        // $id  = 'n';
        $this->_get_datatables_query($id='');
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('kartu_keluarga');
        return $this->db->count_all_results();
	}
	// end datatables
    }

?>