<?php
	class Main_store_model extends CI_Model{
	
	function __construct()
    {     
          parent::__construct();
		  $this->load->database();
    }

	/*-- select --*/
	public function getAllData($id_product){
		$this->db->select('*');
		$this->db->from('tbl_store');
		@$this->db->where('id_product', $id_product);
		$this->db->order_by('date','desc');
		$query = $this->db->get();
		return $query;
	}

	public function getDataByIdStore($id_store){
		$this->db->select('*');
		$this->db->from('tbl_store');
		@$this->db->where('id_store', $id_store);
		$query = $this->db->get();
		return $query;		
	}
        public function getDataByIdProduct($id_product){
                $this->db->select('*');
                $this->db->from('tbl_store');
                @$this->db->where('id_product', $id_product);
                $this->db->order_by('date','desc');
                $query = $this->db->get();
                return $query;
        }
	public function getCountAmountStoreByIdProduct($id_product){
		$this->db->select('sum(total_p) as total');
		$this->db->from('tbl_store');
		$this->db->where('id_product', $id_product);
		$this->db->group_by('id_product');
		$query = $this->db->get();
		return $query;
	}
        public function getCountAmountSellByIdProduct($id_product){
 		$this->db->select('sum(amount) as total_remain');
		$this->db->from('tbl_sell');
		$this->db->where('id_product', $id_product);
		$this->db->group_by('id_product');
		$query = $this->db->get();
//                echo $id_product;
//                print_r($query->row());
		return $query;           
            
        }

	/*--- add store ---*/
	public function insertData($data){
		$this->db->insert('tbl_store',$data);
	}
	/*--- delete ---*/
	public function deleteData($id_store){
		$this->db->where('id_store', $id_store);
		$this->db->delete('tbl_store');	
	}
	/*--- edit ---*/
	public function editData($id_store, $data){
		@$this->db->where('id_store',$id_store);
		@$this->db->update('tbl_store', $data);		
	}

}
?>
	
	
	
