<?php 
class Main_product_model extends CI_Model{
	public function __construct()
    {     
		  parent::__construct();
		  $this->load->database();
    }	
	/*public function getAllData()
		$this->db->select('tp.id_product as idProduct, tp.code_id, tp.name_p, tp.price_p, tp.detail_p, tp.picture_p, tp.date,
						   ts.id_product, ts.id_store, sum( IFNULL(ts.total_p,0) ) as amount_store , ts.date as date_income,
						   sum( IFNULL(tsell.amount,0) ) as amount_sell,  IFNULL(tsell.date_outcome,0) as date_outcome,
						   sum( IFNULL(ts.total_p,0) ) - sum( IFNULL(tsell.amount,0) ) as remain',false);
		$this->db->from('tbl_product as tp');
		$this->db->join('tbl_store as ts','tp.id_product = ts.id_product','left');
		$this->db->join('tbl_sell as tsell','tsell.id_product = ts.id_product','left');
		$this->db->group_by('idProduct');
		$this->db->order_by('tp.date','desc');
		$query = $this->db->get();
		//print_r($query);
		$this->db->close();
		return $query->result();		  	
	}*/
	public function getAllProductData(){
		$query = $this->db->query('select * from(
									select product.id_product as A_id_product, product.code_id, product.name_p, product.price_p , product.detail_p, product.picture_p, product.date,
									sum(store.total_p) as total_amount
									from tbl_product product
									left join tbl_store store
									on product.id_product = store.id_product
									group by product.id_product

								) as query_total_store,
								(
									select product.id_product as B_id_product, product.name_p,
									sell.id_sell, sell.id_product as tbl_sell_id_product, sum(IFNULL(sell.amount,0) ) as total_amount_sell
									from tbl_product as product
									left join tbl_sell as sell
									on product.id_product = sell.id_product
									group by product.id_product
									
								) as query_total_sell
								where query_total_store.A_id_product = query_total_sell.B_id_product
								order by query_total_store.A_id_product desc
						  ');
		//print_r( $query->result() );
		return $query;
	
	}
	public function searchAllProductData($data){
		$query = $this->db->query('select * from(
									select product.id_product as A_id_product, product.code_id, product.name_p, product.price_p , product.detail_p, product.picture_p, product.date,
									sum(store.total_p) as total_amount
									from tbl_product product
									left join tbl_store store
									on product.id_product = store.id_product
									group by product.id_product

								) as query_total_store,
								(
									select product.id_product as B_id_product, product.name_p,
									sell.id_sell, sell.id_product as tbl_sell_id_product, sum(IFNULL(sell.amount,0) ) as total_amount_sell
									from tbl_product as product
									left join tbl_sell as sell
									on product.id_product = sell.id_product
									group by product.id_product
									
								) as query_total_sell
								where query_total_store.A_id_product = query_total_sell.B_id_product
								AND query_total_store.code_id LIKE ?
								AND query_total_store.name_p LIKE ?
								order by query_total_store.A_id_product desc
						  ',$data);
		//print_r( $query->result() );
		return $query;
	
	}

	public function getDataProductById($id_product){
		$query = @$this->db->get_where('tbl_product',array('id_product'=>$id_product));
		//print_r($query->result());
		return $query;
	}

	public function getProductSummary(){
		$query = @$this->db->query('select * from( 
											select sum(store.total_p) as sumStore
											 from tbl_store as store 
											) as A,
											(
											select sum(sell.amount) as sumAmount
											from tbl_sell as sell
											) as B'
								 ,false);
		return $query;
	
	}


	public function isFoundCheckProductCodeId($code_id){
		$this->db->select('id_product, code_id');
		$this->db->from('tbl_product');
		@$this->db->where('code_id', $code_id);
		$result = $this->db->get()->num_rows();
		$this->db->close();
		if($result){
			return true;
		}else{
			return false;
		}

	}
	public function isFoundFileNameInProduct($filename){
		$this->db->select('picture_p');
		$this->db->from('tbl_product');
		@$this->db->where($filename);
		$result = $this->db->get()->num_rows();
		$this->db->close();
		return $result;	
	}
	
	/*--- insert ---*/
	public function insertProduct($data){
		// transection //
		$this->db->trans_begin();
		$this->db->insert('tbl_product',$data['table1']);
		//$data['table2']['id_product'] = $this->db->insert_id();
		//@$this->db->insert('tbl_store',$data['table2']);
		// check transection //
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return false;
		}
		else
		{
			$this->db->trans_commit();
			return true;
		}		
	
	}
	/*--- update ---*/
	public function updateProduct($id_product, $data){
		@$this->db->where('tbl_product.id_product',$id_product);
		@$this->db->update('tbl_product', $data);
	}


	/*--- delete ---*/
	public function deleteProduct($id_product){
		$tables = array('tbl_store','tbl_sell','tbl_product');
		@$this->db->where('id_product', $id_product);
		$this->db->delete($tables);	
	}



}

?>