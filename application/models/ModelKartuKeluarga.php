<?php

    
    class ModelKartuKeluarga extends CI_Model{
        
        // // get desa langsung dari database
        // public function GetDesa()
        // {
        //     $this->db->order_by('nama_desa','ASC');
        //     return $this->db->get('desa')->result_array();
        // }
        // get dusun
        // tampilkan dusun yg id desanya $val
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
            // siapkan data
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
                'date'      => null,
            ];
            $this->db->insert('kartu_keluarga',$data);
        }
    }

?>