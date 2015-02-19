<?php
	class Main_sell_model extends CI_Model{
	
	function __construct()
     {     
          parent::__construct();
		  $this->load->database();
     }



	public function getTotalDataPrint(){ // get summary data for print
		$query = @$this->db->query("
					   select (sum(query_total_store.total_amount) - sum(query_total_sell.total_amount_sell) ) as remain  ,
                                           sum( query_total_store.price_p * query_total_sell.total_amount_sell ) as revenue,
                                           sum(total_amount_sell) as totalAmountSell, sum(total_amount) as totalAmountProduct 
                                           from
                                           (
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
		");

		
                $this->db->close();
		//print_r($query->row());
		return $query->row();
	}

	public function getAllData(){ // get all data tbl_sell

            $query = @$this->db->query('select *, (query_total_store.total_amount - query_total_sell.total_amount_sell) as total   from
                                    (
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
                                    order by query_total_store.A_id_product desc');
       // print_r($query->result());
            $this->db->close();
            return $query->result();
	}
	public function searchAllData($data){ // search data

            $query = @$this->db->query('select *, (query_total_store.total_amount - query_total_sell.total_amount_sell) as total   from
                                    (
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
                                    order by query_total_store.A_id_product desc',$data);
            $this->db->close();
            return $query->result(); // get all data
	}
	
	public function getDataById($id_sell){ // get data by id_sell
            $data = array('id_sell'=>$id_sell);
            $query = @$this->db->query(' select *, (query_total_store.total_amount - query_total_sell.total_amount_sell) as total   from
                                        (
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
                                        AND   query_total_store.A_id_product = ?
                                        order by query_total_store.A_id_product desc',$data);
		//print_r($query->row());
                $this->db->close();
		return $query->row();				// get only data			
	}

	public function getAllDataInvoice($where){ // get data invoice
		$this->db->select("*,(product.price_p * sell.amount) as priceTotal");
		$this->db->from("tbl_product as product");
		$this->db->join("tbl_sell as sell","product.id_product = sell.id_product","left");
		@$this->db->where_in('sell.id_product', $where['id_product']);
		@$this->db->where_in('sell.date_outcome', $where['date_outcome']);
		//$this->db->join("tbl_sell as sell", "product.id_product  = sell.id_product", "left");

		
		$query = $this->db->get()->result(); // get all data
		//print_r($query);
                $this->db->close();
		return $query;
	}
	public function getTotalDataInvoice($where){
		$this->db->select("sum(product.price_p * sell.amount) as priceTotal , ",false);
		$this->db->from("tbl_product as product");
		$this->db->join("tbl_sell as sell","product.id_product = sell.id_product","left");
		@$this->db->where_in('sell.id_product', $where['id_product']);
		@$this->db->where_in('sell.date_outcome', $where['date_outcome']);
		$query = $this->db->get()->row();
		//print_r($query);
                $this->db->close();
		return $query;
	
	}

	public function insertConfirmSell($data){ // insert data
		return $this->db->insert_batch('tbl_sell',$data); // insert data multiple table
	}
	public function sell_getinvoice(){

	$query = $this->db->query('SELECT * FROM tbl_product');
            $this->db->close();
            return $query->result();
	}
	
	/*public function get_print(){
	try{
			$this->db->select('prd.*,sl.date_outcome,sl.amount');
			$this->db->from('tbl_product as prd');
			$this->db->join('tbl_sell as sl', 'sl.code_id = prd.id', 'left');		
			$query = $this->db->get();
			if($query->num_rows() == 0){
				throw new Exception();
			}
			return $query->result();

		}catch(Exception $ex){
			return false; // not found any data
		}finally{
			$this->db->close();
		}
	
	}*/
	
	/*----------------INSERT--------------------------*/
	
//	public function insert_to_db($data)
//	{
//		
//		return $this->db->insert('tbl_sell',$data);
//	}
	
	/*-------------------------------------------*/
//	public function updateById($id){
//		$query = $this->db->get_where('tbl_product',array('id_product'=>$id));
//		return $query->row_array();
//	}
	
//	function getByCodeId($code_id, $table = "tbl_product"){
//
//		$this->db->select('id_product, code_id');
//		$this->db->from($table);
//		$this->db->where('code_id', $code_id);
//
//		$result = $this->db->get()->row();
//		return $result;
//	}
	

	
	
//	public function update_info($data,$id)
//	{
//		$this->db->where('tbl_sell.id_product',$id);
//		return $this->db->update('tbl_sell', $data);
//
//		}
	/*-------------------------------------------*/
	public function getAllDataByLike($word){ // get all data by search
		try{

			$data = array($word['code_id']."%", $word['name_p']."%");
			$query =  @$this->db->query('select *, (query_total_store.total_amount - query_total_sell.total_amount_sell) as total   from
                                    (
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
                                    order by query_total_store.A_id_product desc',$data);



			if($query->num_rows() == 0){ // error
				throw new Exception();
			}
//			print_r($query->result());
			$this->db->close(); // close
			return $query->result(); // return data

		}catch(Exception $ex){
			$this->db->close();
			return false; // not found any data
		}
	}
	
	/*-------------------------------------*/
	public function getAllDataByInvoice($word){ 
		try{
			$this->db->select('prd.*,sl.date_outcome,sl.amount,sl.id_sell');
			$this->db->from('tbl_product as prd');
			$this->db->join('tbl_sell as sl', 'sl.code_id = prd.id', 'left');
			@$this->db->like('sl.id_sell', $word['id_sell'], 'after');
			$query = $this->db->get();
			if($query->num_rows() == 0){
				throw new Exception();
			}
			$this->db->close(); // close database
			return $query->result(); 

		}catch(Exception $ex){
			$this->db->close();
			return false; // not found any data
		}
	}
        
        public function deleteDataSell($id_product){ // delete
            	$this->db->where('id_product', $id_product);
		$this->db->delete('tbl_sell');	
            
        }
	

}
?>