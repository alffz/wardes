<?php

    
    class ModelJalan extends CI_Model{
        
        // tambah data dusun
        public function tambahjln()
        {           
            // siapkan data 
            $dusun = [
                'id_jalan'   => uniqid(),
                'id_dusun'   => $this->input->post('dusun'),
                'nama_jalan' => $this->input->post('jalan'),
            ];
            $this->db->insert('jalan',$dusun);
        } 
        
        // get desa
        public function getdusun()
        {
            $user   = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
            $id = $user['id_dusun'];
            $this->db->select('*');
            $this->db->from('dusun');
            $this->db->where('id_dusun',$id);
            return $this->db->get()->row_array();
        }
    }

?>