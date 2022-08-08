<?php
class admin_model extends CI_Model{
	public function tampildata($nama_table,$urut_id){
    	return $this->db->from($nama_table)
					->order_by($urut_id, 'DESC')
					->get('');
    } 
	public function simpandata($nama_table,$data){
		return $this->db->insert($nama_table, $data);
	}
	public function hapusdata($nama_table,$id,$idkey)
	{
		return $this->db->delete($nama_table,array($idkey =>$id));
	}
	public function formeditdata($nama_table,$idkey,$id)
	{
		return $this->db->get_where($nama_table, array($idkey=>$id))->row();
	}
	public function editdata($nama_table,$idkey,$id,$data)
	{
		$query=$this->db->where($idkey,$id)
					->update($nama_table,$data);
		return $query;
	}
	public function combobox($nama_table,$idkey,$isi_pilih,$nama_field){
		$query=$this->db->get($nama_table);
		$tambah[set_value($idkey)]=$isi_pilih;
		if ($query->num_rows()>0){
			foreach ($query->result() as $row) {
				$tambah[$row->$idkey]=$row->$nama_field;
			}
		}
		return $tambah;
	}
	public function no_invoice(){
		// pada table orders (Tambah 's'), AI (Auto Increament) dihilangkan 
		$n = $this->db->query("SELECT MAX(RIGHT(id_orders,4)) AS kd_max FROM orders");
        $kd = "";
        if($n->num_rows()>0){
            foreach($n->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
       
        return $kd;
	}
	public function simpan_multi($nama_table,$data){
		return $this->db->insert_batch($nama_table, $data);
	}

	public function tampiljoin($tableawal,$tabledua,$idgabung,$idutama){
    	$query=$this->db->select ('*')
						->from($tableawal)
						->join($tabledua,''.$tableawal.'.'.$idgabung.'='.$tabledua.'.'.$idgabung.'','left')
						->order_by($idutama,'DESC')
						->get();
		return $query;
	}
	public function tampiljoin_where($tableawal,$tabledua,$idgabung,$idutama,$id){
    	$query=$this->db->select ('*')
						->from($tableawal)
						->where('id_orders',$id)
						->join($tabledua,''.$tableawal.'.'.$idgabung.'='.$tabledua.'.'.$idgabung.'','left')
						->order_by($idutama,'DESC')
						->get()->result();;
		return $query;
    }
}


?>