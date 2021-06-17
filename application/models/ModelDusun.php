<?php

    
    class ModelDusun extends CI_Model{
        
        // tambah data dusun
        public function tambahdsn()
        {           
            // siapkan data 
            $dusun = [
                'id_dusun'  => uniqid(),
                'id_desa'   => $this->input->post('desa',true),
                'nama_dusun'=> $this->input->post('dusun',true),
            ];
            $this->db->insert('dusun',$dusun);
        } 
        
        // get desa
        public function getdesa()
        {
            return $this->db->get('desa')->result_array();
        }

        // get dusun
        public function GetDusun($var = null)
        {
            $this->db->select("*");
            $this->db->from('dusun');
            $this->db->where('nama_dusun !=',0);
            $this->db->order_by('nama_dusun','asc');
            return $this->db->get()->result();
        }

    }

?>