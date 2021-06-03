<?php
    class ModelAnggotaKeluarga extends CI_Model{

        public function tambahAk(Type $var = null)
        {
            $data = [
                'id'                => uniqid(),
                'id_kk'             => $this->uri->segment(3),
                'nama'              => $this->input->post('nama',true),
                'nik'               => $this->input->post('nik',true),
                'kelamin'           => $this->input->post('kelamin',true),
                'tmpt_lahir'        => $this->input->post('tmptlahir',true),
                'tanggal_pencatatan'=> $this->input->post('tanggal',true),
                'agama'             => $this->input->post('agama',true),
                'pendidikan'        => $this->input->post('pendidikan',true),
                'pekerjaan'         => $this->input->post('pekerjaan',true),
                'status_perkawinana'=> $this->input->post('status',true),
                'id_hub_keluarga'   => $this->input->post('hubungan',true),
                'kewarganegaraan'   => $this->input->post('kewarganegaraan',true),
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
    }


?>