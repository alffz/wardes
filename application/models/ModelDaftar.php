<?php

    class ModelDaftar extends CI_Model{

        public function daftar(Type $var = null)
        {
            $data   = [
                'id_user'   => "id_user".uniqid(),
                'email'     => $this->input->post("email",true),
                'password'  => $this->input->post('password',true),
                'id_dusun'  => '60cad01dc3175',
                'nama'      => $this->input->post('nama',true),
                'gambar'    => 'gambar/default.png',
                'role_id'   => 3,
                'is_active' => 0,
                'date'      => date('d').date('m').date('y')
            ];
            $this->db->insert('user',$data);
        }
    }

?>