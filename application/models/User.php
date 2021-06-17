<?php

    class User extends CI_Model{

        public function Getuser(Type $var = null)
        {
            $this->db->select('*');
            $this->db->from('dusun');
            $this->db->join('user', 'dusun.id_dusun = user.id_dusun',"left");
            $this->db->where('role_id !=', 1);
            return $this->db->get()->result_array();
            // SELECT * FROM user left join dusun ON user.id_dusun = dusun.id_dusun where role_id !=1
        }

        public function Getdusun(Type $var = null)
        {
            $this->db->order_by('nama_dusun', 'asc');
           return $this->db->get('dusun')->result_array();
           
        }

        public function hapus()
        {
            $id     = $this->uri->segment(3);
            // hapus user
            $this->db->where('id_user',$id);
            $this->db->delete('user');
            redirect('sekdes/kadus');

        }
    }

?>