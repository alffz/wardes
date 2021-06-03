<?php

    class ModelData extends CI_Model{
        	// start datatables
    var $column_order = array(null, null, 'nama_kk','nama_dusun','nama_jalan','nama_gang'); //set column field database for datatable orderable
    var $column_search = array('nik','nama_kk', 'nama_dusun','nama_jalan','nama_gang'); //set column field database for datatable searchable
    var $order = array('waktu' => 'desc'); // default order 
    // SELECT * FROM `kartu_keluarga` 
    //     JOIN dusun ON kartu_keluarga.id_dusun = dusun.id_dusun 
    //     JOIN gang ON gang.id_gang = kartu_keluarga.id_gang 
    //     JOIN jalan ON kartu_keluarga.id_jalan = jalan.id_jalan 
    // WHERE dusun.id_dusun = 'xxxx' 

    private function _get_datatables_query() {
        $this->db->select('*');
		$this->db->from('kartu_keluarga');
		$this->db->join('dusun', 'kartu_keluarga.id_dusun = dusun.id_dusun');
		$this->db->join('jalan', 'kartu_keluarga.id_jalan = jalan.id_jalan');
        $this->db->join('gang', 'kartu_keluarga.id_gang = gang.id_gang');
        // ketika user.id_dusun = id_dusun 
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
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
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