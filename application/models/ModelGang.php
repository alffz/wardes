<?php

    
    class ModelGang extends CI_Model{
        
        // tambah data gang
        public function tambahgang()
        {           
            // siapkan data 
            $gang = [
                'id_gang'    => uniqid(),
                'id_jalan'   => $this->input->post('jalan',true),
                'nama_gang'  => $this->input->post('gang',true),
            ];
            $this->db->insert('gang',$gang);
        } 
        
        // get jalan
        public function GetDusun()
        {
            $user   = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
            $id = $user['id_dusun'];
            $this->db->select('*');
            $this->db->from('dusun');
            $this->db->where('id_dusun',$id);
            return $this->db->get()->row_array();
        }
        // get jalan
        public function GetJalan()
        {
            $id = $this->GetDusun();
            $id = $id['id_dusun'];
            $this->db->where('id_dusun',$id);
            $this->db->order_by('nama_jalan',);
           return $this->db->get('jalan')->result();           
        }

        // start datatables
        var $column_order = array(null, 'nama_gang',null); //set column field database for datatable orderable
        var $column_search = array('nama_gang','nama_jalan','nama_dusun'); //set column field database for datatable searchable
        var $order = array('nama_gang' => 'desc'); // default order 
        /*  SELECT dusun.nama_dusun FROM `anggota_keluarga` 
                JOIN kartu_keluarga ON anggota_keluarga.id_kk = kartu_keluarga.id_kk 
                JOIN dusun ON kartu_keluarga.id_dusun = dusun.id_dusun
        */

        private function _get_datatables_query($id_dusun) {
            // jika id_dusun = sekdes , maka tampilkan semua record
        if($id_dusun=='sekdes'){
            $this->db->select('*');
            $this->db->from('gang');
            $this->db->join('jalan','gang.id_jalan = jalan.id_jalan');            
            $this->db->join('dusun','jalan.id_dusun = dusun.id_dusun');
        }
        else{
            $id_dusun   = $id_dusun;
            $this->db->select('*');
            $this->db->from('gang');
            $this->db->join('jalan','gang.id_jalan = jalan.id_jalan');
            $this->db->join('dusun','jalan.id_dusun = dusun.id_dusun');
            $this->db->where('jalan.id_dusun',$id_dusun);
        }
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
        function get_datatables($id_dusun) {
            $id = $id_dusun;
            $this->_get_datatables_query($id);
            if(@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
            $query = $this->db->get();
            return $query->result();
        }
        function count_filtered() {
            $id  = $this->input->post('id_dusun');
            $this->_get_datatables_query($id);
            $query = $this->db->get();
            return $query->num_rows();
        }
        function count_all() {
            $id  = $this->input->post('id_dusun');
            $this->db->from('jalan');
            return $this->db->count_all_results();
        }
    }

?>