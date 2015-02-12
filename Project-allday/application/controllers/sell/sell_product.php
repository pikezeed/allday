<?php
class Sell_product extends CI_Controller{
	
	public function __construct()
     {
          parent::__construct();
		  $this->load->model('sell/sell_models');
		  $this->load->helper('date');
		  $this->load->helper('form');
		  $this->load->helper('url');        
     }
/*----------------SHOW---------------------------*/
	public function get_sell(){
	$data['query']=
	$this->sell_models->sell_getall();
	$this->load->view('sell/sell_home',$data);	
	}
	
	
	public function invoice(){
		$id_sell = $this->input->post('id_sell',true);
		$arrayLike = array('id_sell' => $id_sell);
	
		$data['query'] = $this->sell_models->getAllDataByInvoice($arrayLike);
		if(!$data['query']){ // not found
			$this->data['error'] = "not found data";
			$this->load->view('sell/sell_invoice',$data);
		}else{
			
			$this->load->view('sell/sell_invoice',$data);
		}
	}	
/*----------------INSERT---------------------------*/

	public function add_sell(){	
		$this->load->helper(array('form', 'url'));
		$this->load->view('sell/sell_home2');
	}
	public function sell_Add()
	{
	
		$date = "%Y-%m-%d | %h:%i:%s";
		$time = time();
		$id_sell 	= $this->input->get('id_sell');
		$code_id 	= $this->input->post('code_id');
		$amount 	= $this->input->post('amount');
		$date_outcome 	= mdate($date, $time);
		
			$id = $this->sell_models->getByCodeId($code_id, 'tbl_product')->id;
			echo $id_sell;
			$data = array( 
						  'amount'	=>	$amount,
						  'date_outcome'	=>	$date_outcome,
						  'code_id' => $id
										
						  );
		
					$res = $this->sell_models->insert_to_db($data);
					if($res){
							header('location:'.base_url()."index.php/sell/sell_product/invoice/?id=".$id_sell.$this->invoice());
							}
			
		
	}
		
/*-------------------------------------------*/	

	public function edit(){
		$id = $this->input->get('id');
		$news = $this->sell_models->updateById($id);
		$data['code_id'] = $news['code_id'];
		$data['name_p'] = $news['name_p'];
		$data['price_p'] = $news['price_p'];
		$data['picture_p'] = $news['picture_p'];
		$this->load->view('sell/sell_home2', $data);
		}

	public function searchByLike(){
		$code_id = $this->input->post('code_id',true);
		$name_p = $this->input->post('name_p',true);
		$date_outcome = $this->input->post('date_outcome',true);
		$arrayLike = array('name_p'=> $name_p, 'code_id' => $code_id, 'date_outcome' => $date_outcome);
	
		$data['query'] = $this->sell_models->getAllDataByLike($arrayLike);
		if(!$data['query']){ // not found
			$this->data['error'] = "not found data";
			$this->load->view('sell/sell_search',$data);
		}else{
			
			$this->load->view('sell/sell_search',$data);
			//$this->success($data);
		}
	}
/*----------------PRINT-------------------------*/
	
		function printDetailSell(){
		
		$data['query'] = $this->sell_models->get_print();
		if( empty($data['query']) ){
			$this->load->helper('form');
			$data['error'] = "ไม่พบข้อมูล";
			$this->load->view('sell/sell_print',$data);
		}else{
			$this->load->helper('date');
			$data['img_date'] =  mdate("%Y-%m-%d %H:%i:%s");
			$this->load->helper(array('form','url'));
			$this->load->view('sell/sell_print',$data);
		}

	
	}
	
	

	
	
	
	

}
?>