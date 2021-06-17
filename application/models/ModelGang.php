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
    }

?>