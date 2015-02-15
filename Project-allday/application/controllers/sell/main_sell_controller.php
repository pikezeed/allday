<?php
class Main_sell_controller extends CI_Controller{
	public $data = null;
	public function __construct()
     {
          parent::__construct();
		  $this->data = null;
		  $this->load->model('sell/main_sell_model');
		  $this->load->helper('date');
		  $this->load->helper('form');
		  $this->load->helper('url');        
     }
/*----------------SHOW---------------------------*/
	public function index(){
		$this->load->helper('form');
		$date = "%Y-%m-%d %H:%i:%s";
		$time = now();
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$data['date'] =  mdate($date, $time);
		$data['query'] = $this->main_sell_model->getAllData();
		if($this->data['error']){
			$data['error'] = $this->data['error'];
		}
		$this->load->view('sell/index',$data);	
	}
	public function searchProductForSell(){
		$code_id = $this->input->post('code_id',true)."%";
		$name_p = $this->input->post('name_p',true)."%";
		$data = array($code_id,$name_p);

		$this->load->helper('form');
		$date = "%Y-%m-%d %H:%i:%s";
		$time = now();
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$data['date'] =  mdate($date, $time);
		$data['query'] = $this->main_sell_model->searchAllData($data);
		if($this->data['error']){
			$data['error'] = $this->data['error'];
		}
		$this->load->view('sell/index',$data);	

	}
	public function showConfirmSell(){
		$this->load->helper(array('form', 'url'));
		$date = "%Y-%m-%d %H:%i:%s";
		$time = now();
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$data['date'] =  mdate($date, $time);

		$id_product = $this->input->get('id_product');
		if($this->data['error']){
			$data['error'] = $this->data['error'];
		}

		$query = $this->main_sell_model->getDataById($id_product);
		$data['query'] = $query;
		/*$data['code_id'] = $news['code_id'];
		$data['name_p'] = $news['name_p'];
		$data['price_p'] = $news['price_p'];
		$data['picture_p'] = $news['picture_p'];*/
		$this->load->view('sell/show_confirm_sell', $data);
	}	
	
	public function confirmSell(){
		$date = "%Y-%m-%d %H:%i:%s";
		$time = now();
		$date_outcome 	= mdate($date, $time);
		$data = array();
		$where = array( 'id_product' => array(),
						'date_outcome' => array($date_outcome)
					  );
		if( !empty($this->input->post('checkSelect')) ){
			foreach( $this->input->post('checkSelect') as $id_product ){
				$amount = $this->input->post('txt_'.$id_product);
				$total	= $this->input->post('total_'.$id_product);
				

			
				if($total < $amount || empty($amount) || empty($total) ){
					//echo $total." = ".$amount;
					unset($data);
					break;
				}else{
					array_push($data, array('amount' => $amount,
											'date_outcome' => $date_outcome,
											'id_product' => $id_product)
								);
					array_push($where['id_product'],$id_product);
				}
			}			
		}
		


		//print_r($data);
		//$this->main_sell_model->insertConfirmSell($data);
	    //redirect('sell/main_sell_controller', 'refresh');
		
		if(empty($data) ){

			$this->data['error'] = "input fail data";
			$this->index();

		}else{
			//print_r($where['date_outcome']);
			$this->main_sell_model->insertConfirmSell($data);
			$data['query'] =  $this->main_sell_model->getAllDataInvoice($where);
			$data['total'] =  $this->main_sell_model->getTotalDataInvoice($where);
			$this->load->view('sell/show_invoice_sell',$data);

		}
	
	}

	public function showPrintSell(){
		$this->load->helper('form');
		$date = "%Y-%m-%d %H:%i:%s";
		$time = now();
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$data['date'] =  mdate($date, $time);
		$data['query'] = $this->main_sell_model->getAllData();
		$data['total'] = $this->main_sell_model->getTotalDataPrint();
		
		if($this->data['error']){
			$data['error'] = $this->data['error'];
		}
		$this->load->view('sell/show_print_sell',$data);
	
	
	}
	public function confirmSell2(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('amount','Amount','trim|required');

		$amount = $this->input->post('amount');
		$id_product = $this->input->post('id_product');
		$_GET['id_product'] = $id_product;

		$query = $this->main_sell_model->getDataById($id_product);
		if($this->form_validation->run() == FALSE){
			$this->showConfirmSell();					// call view show_add_product
		}else if($query->total < $amount){
			$this->data['error'] = "สินค้าไม่พอ";
			$this->showConfirmSell();	
		}else{
			$date = "%Y-%m-%d %H:%i:%s";
			$time = now();
			$data = array('amount' => $amount,
						  'date_outcome' => $date,
						  'id_product' => $id_product
						 );
			$this->main_sell_model->insertConfirmSell($data);

			redirect('sell/main_sell_controller', 'refresh');
		}


	
		

		/*$date = "%Y-%m-%d | %h:%i:%s";
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
		}	*/	
	}



	/*----- invoice -----*/
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