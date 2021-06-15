<?php

    class hapus extends CI_Controller{

        public function hapusAk()
        {
            $id_ak   = $this->uri->segment(3);
            $id_kk   = $this->uri->segment(4);
            $this->db->delete('anggota_keluarga',array('id_ak'=>$id_ak));
            redirect('data/anggotakeluarga/'.$id_kk);
        }
    }

?>