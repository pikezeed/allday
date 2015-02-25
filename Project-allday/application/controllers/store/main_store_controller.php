<?php 
class Main_store_controller extends CI_Controller{
	public $data = null;

	public function __construct(){
		parent::__construct();
		$this->load->helper('my_session_helper');
		$this->load->helper('date');
		$this->load->helper('url');
		$this->load->model('product/main_product_model');
		$this->load->model('store/main_store_model');
                $this->load->model('sell/main_sell_model');
		date_default_timezone_set('Asia/Bangkok');	
	}

	/*-- show to view --*/
	public function showStore(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                        $data['session'] = $this->session->userdata('logged_in');    
			//echo "<br>test Post <br>".$this->input->post('total');
			$date = "%Y-%m-%d %H:%i:%s";
			$time = now();
			$id_product = $this->input->get('id_product');
			$data['date'] =  mdate($date, $time);
			$data['query_product'] = $this->main_product_model->getDataProductById($id_product)->row();
			//print_r($data['query_product']);
			$data['query_store']=  $this->main_store_model->getAllData($id_product);
			$data['query_total'] = $this->main_store_model->getCountAmountStoreByIdProduct($id_product)->row();
                        $data['query_remain'] = $this->main_store_model->getCountAmountSellByIdProduct($id_product)->row();
                        if( empty($data['query_total']->total) ){
                            $data['query_total'] = 0;
                        }
                        if( empty($data['query_remain']->total_remain) ){
                            $data['query_remain'] = 0;
                        }
			//print_r($data['query_remain']);
			$this->initialClearCaheImg();
			$this->load->helper('form');
			
			$this->load->view('store/show_store',$data);	
			
		}
	
	}

	/*-- add store --*/
	public function addStore(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in'); 
                }
		$id_product = $this->input->post('id_product');
		$id_store = $this->input->post('id_store');
		$amount = $this->input->post('total');
		$date = "%Y-%m-%d %H:%i:%s";
		$time = now();
		$_GET['id_product'] = $id_product;
		$this->load->library('form_validation');
		$this->form_validation->set_rules('total','Total','trim|required');
                $this->form_validation->set_error_delimiters('<label class="validate_error">','</label>');
		if($this->form_validation->run() == FALSE){
			
			$this->showStore();
		}else{
			$data = array('total_p'=>$amount,
						  'date'   => mdate($date, $time),
						  'id_product' => $id_product
						  );
			$this->main_store_model->insertData($data);
			redirect("store/main_store_controller/showStore/?id_product=".$id_product."","refresh");
		}
	}

	/*-- delete store --*/
	public function deleteStore(){
		$id_store = $this->input->get('id_store');
                $id_product = $this->input->get('id_product');
		$this->main_store_model->deleteData($id_store);
                $count = $this->main_store_model->getDataByIdProduct($id_product)->num_rows();
                if($count <= 0){
                    $this->main_sell_model->deleteDataSell($id_product);
                }
		$this->showStore();
	
	}
	
	/*-- edit store --*/

	public function showEditStore(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                        $data['session'] = $this->session->userdata('logged_in'); 
			$id_store	= $this->input->get('id_store');
			$data['query_store']=  $this->main_store_model->getDataByIdStore($id_store)->row();
			//print_r($data['query_store']);
			$this->load->helper('form');
			$this->load->view('store/show_edit_store',$data);
		}		

	
	}
	public function editStore(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
                }else{
                    $data['session'] = $this->session->userdata('logged_in'); 
                }
                $this->load->library('form_validation');
		$this->form_validation->set_rules('amount','Amount','trim|required');
                $this->form_validation->set_error_delimiters('<label class="validate_error">','</label>');
                if( $this->form_validation->run() == false ){
			$_GET['id_product'] =  $this->input->post('id_product',true);
                        $_GET['id_store']   =  $this->input->post('id_store', true);
                        $this->showEditStore();
                }else{
                
                    $id_product = $this->input->post('id_product');
                    $id_store	= $this->input->post('id_store');

                    $amount		= $this->input->post('amount');
                    $table_store = array('total_p' => $amount);
                    $this->main_store_model->editData($id_store, $table_store);
                    redirect("store/main_store_controller/showStore/?id_product=".$id_product."","refresh");
                }
	
	}

	/*--- print ---*/
	public function printStore(){
		
	
	}



	/* ----- Helper -----*/
	public function initialClearCaheImg(){
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
	}

}

?>