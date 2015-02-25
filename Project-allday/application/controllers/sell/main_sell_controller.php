<?php
class Main_sell_controller extends CI_Controller{
	public $data = null;
	public function __construct()
     {
          parent::__construct();
                
		  $this->data = null;
                  // #### import function #### //
                  $this->load->helper('my_session_helper');
		  $this->load->model('sell/main_sell_model');
		  $this->load->helper('date');
		  $this->load->helper('form');
		  $this->load->helper('url');        
     }

	public function index(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
                    redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in'); 
                }
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
		$data['query'] = $this->main_sell_model->getAllData(); // get all data from tbl_sell
		if($this->data['error']){
			$data['error'] = $this->data['error'];
		}
		$this->load->view('sell/index',$data);	// show index.php
	}
	public function searchProductForSell(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in'); 
                }
		$code_id = $this->input->post('code_id',true)."%";
		$name_p = $this->input->post('name_p',true)."%";
		$data = array($code_id,$name_p); // prepare store argument 

		$this->load->helper('form');
		$date = "%Y-%m-%d %H:%i:%s";
		$time = now();
                
                // #### clear cahe #### //
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$data['date'] =  mdate($date, $time); // get date
		$data['query'] = $this->main_sell_model->searchAllData($data);   // get all data by search 
		if($this->data['error']){
			$data['error'] = $this->data['error'];
		}
		$this->load->view('sell/index',$data);	// show index.php

	}
	public function showConfirmSell(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in'); 
                }
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
		if($this->data['error']){ // check variable exist value error
			$data['error'] = $this->data['error'];
		}

		$query = $this->main_sell_model->getDataById($id_product);      // get only data from tbl_sell
		$data['query'] = $query;

		$this->load->view('sell/show_confirm_sell', $data);             // view show_confirm_sell.php
	}	
	
	public function confirmSell(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in'); 
                }
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
		
					unset($data); // clear variable $data
					break;
				}else{
					array_push($data, array('amount' => $amount,
                                                                'date_outcome' => $date_outcome,
                                                                'id_product' => $id_product)
                                                   );
					array_push($where['id_product'],$id_product); // prepare data for management in database
				}
			}			
		}
		
		
		if(empty($data) ){  // if data is null

			$this->data['error'] = "กรอกข้อมูลไม่ครบถ้วน";
			$this->index(); // call index function

		}else{
			$this->main_sell_model->insertConfirmSell($data); // insert data into database
			$data['query'] =  $this->main_sell_model->getAllDataInvoice($where);
			$data['total'] =  $this->main_sell_model->getTotalDataInvoice($where);
			$this->load->view('sell/show_invoice_sell',$data); // view show_invoice_sell.php

		}
	
	}

	public function showPrintSell(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in'); 
                }
		$this->load->helper('form');
		$date = "%Y-%m-%d %H:%i:%s";
		$time = now();
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		$data['date'] =  mdate($date, $time); // get date
		$data['query'] = $this->main_sell_model->getAllData(); // get all data tbl_sell
 		$data['total'] = $this->main_sell_model->getTotalDataPrint(); // get summary sell
		
		if($this->data['error']){
			$data['error'] = $this->data['error'];
		}
		$this->load->view('sell/show_print_sell',$data); // view show_print_sell.php
	
	
	}
        
        
//	public function confirmSell2(){
//		if(!checkIsSession($this->session->userdata('logged_in')) ){
//			redirect('employee/login_emp_controller/view', 'refresh');
//		}else{
//                    $data['session'] = $this->session->userdata('logged_in'); 
//                }
//		$this->load->library('form_validation');
//		$this->form_validation->set_rules('amount','Amount','trim|required');
//
//		$amount = $this->input->post('amount');
//		$id_product = $this->input->post('id_product');
//		$_GET['id_product'] = $id_product;
//
//		$query = $this->main_sell_model->getDataById($id_product);
//		if($this->form_validation->run() == FALSE){
//			$this->showConfirmSell();					// call view show_add_product
//		}else if($query->total < $amount){
//			$this->data['error'] = "สินค้าไม่พอ";
//			$this->showConfirmSell();	
//		}else{
//			$date = "%Y-%m-%d %H:%i:%s";
//			$time = now();
//			$data = array('amount' => $amount,
//						  'date_outcome' => $date,
//						  'id_product' => $id_product
//						 );
//			$this->main_sell_model->insertConfirmSell($data);
//
//			redirect('sell/main_sell_controller', 'refresh');
//		}
//	
//	}



	/*----- invoice -----*/
	public function invoice(){ 
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in'); 
                }
		$id_sell = $this->input->post('id_sell',true);
		$arrayLike = array('id_sell' => $id_sell);
	
		$data['query'] = $this->sell_models->getAllDataByInvoice($arrayLike); // get data invoice 
		if(!$data['query']){ // not found
			$this->data['error'] = "not found data";
			$this->load->view('sell/sell_invoice',$data); // view sell_invoice.php
		}else{
			
			$this->load->view('sell/sell_invoice',$data); // view sell_invoice.php
		}
	}	
/*----------------INSERT---------------------------*/

	
//	public function add_sell(){	
//		if(!checkIsSession($this->session->userdata('logged_in')) ){
//			redirect('employee/login_emp_controller/view', 'refresh');
//		}else{
//                    $data['session'] = $this->session->userdata('logged_in'); 
//                }
//		$this->load->helper(array('form', 'url'));
//		$this->load->view('sell/sell_home2');
//	}


//	public function sell_Add()
//	{
//		if(!checkIsSession($this->session->userdata('logged_in')) ){
//			redirect('employee/login_emp_controller/view', 'refresh');
//		}else{
//                    $data['session'] = $this->session->userdata('logged_in'); 
//                }
//		$date = "%Y-%m-%d | %h:%i:%s";
//		$time = time();
//		$id_sell 	= $this->input->get('id_sell');
//		$code_id 	= $this->input->post('code_id');
//		$amount 	= $this->input->post('amount');
//		$date_outcome 	= mdate($date, $time);
//		
//			$id = $this->sell_models->getByCodeId($code_id, 'tbl_product')->id;
//			echo $id_sell;
//			$data = array( 
//						  'amount'	=>	$amount,
//						  'date_outcome'	=>	$date_outcome,
//						  'code_id' => $id
//										
//						  );
//		
//					$res = $this->sell_models->insert_to_db($data);
//					if($res){
//							header('location:'.base_url()."index.php/sell/sell_product/invoice/?id=".$id_sell.$this->invoice());
//							}
//			
//		
//	}
		
/*-------------------------------------------*/	




/*----------------PRINT-------------------------*/
	
//		function printDetailSell(){
//		if(!checkIsSession($this->session->userdata('logged_in')) ){
//			redirect('employee/login_emp_controller/view', 'refresh');
//		}else{
//                    $data['session'] = $this->session->userdata('logged_in'); 
//                }
//		$data['query'] = $this->sell_models->get_print();
//		if( empty($data['query']) ){
//			$this->load->helper('form');
//			$data['error'] = "ไม่พบข้อมูล";
//			$this->load->view('sell/sell_print',$data);
//		}else{
//			$this->load->helper('date');
//			$data['img_date'] =  mdate("%Y-%m-%d %H:%i:%s");
//			$this->load->helper(array('form','url'));
//			$this->load->view('sell/sell_print',$data);
//		}
//
//	
//	}
	
	

	
	
	
	

}
?>