<?php 
class Main_product_controller extends CI_Controller{
	public $data= null;

        public function __construct()
        {
          parent::__construct();
                  // #### import files #### //
		  $this->load->helper('my_session_helper');
		  $this->load->helper('date');
		  $this->load->helper('url');
		  $this->load->model('product/main_product_model');
                  // #### set time zone #### //
		  date_default_timezone_set('Asia/Bangkok');
		  //$this->data = null; 
        }
        
        
	 public function index(){
                // #### check Session #### //
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                        $data['session'] = $this->session->userdata('logged_in');    // store session
			$this->load->helper('form');
			$date = "%Y-%m-%d %H:%i:%s";
			$time = now();

                        // clear cahe image //
			$this->output->set_header('HTTP/1.0 200 OK');
			$this->output->set_header('HTTP/1.1 200 OK');
			$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
			$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
			$this->output->set_header("Pragma: no-cache");

			$data['date'] =  mdate($date, $time); // set date
			$data['query']=  $this->main_product_model->getAllProductdata()->result(); // get all data product
			$this->load->view('product/index',$data);	
		}
	 }

	 /* search */
	 public function searchProduct(){ 
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                        $data['session'] = $this->session->userdata('logged_in');    
                     
			$code = null;
			$name = null;
			$code 	= $this->input->post('code')."%";
			$name 	= $this->input->post('name')."%";


			$this->load->helper('form');
			$date = "%Y-%m-%d %H:%i:%s";
			$time = now();

			$this->output->set_header('HTTP/1.0 200 OK');
			$this->output->set_header('HTTP/1.1 200 OK');
			$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
			$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
			$this->output->set_header("Pragma: no-cache");

			
		
			$param_data = array($code,$name); // prepare argument[parameter] pass to searchAllProductDaa fuction
			
			$data['query']=  $this->main_product_model->searchAllProductData($param_data)->result(); // get all data by search
			
			
			$data['date'] =  mdate($date, $time);           // get date
			$this->load->view('product/index',$data);	// view index.php
		}		
	 
	 }



	 /* add prroduct */
	 public function showAddProduct(){
		$data = null;
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }
		$this->load->helper('form'); // load help form
		if($this->data['error']){
			$data['error'] = $this->data['error'];
		}
		$this->load->view('product/show_add_product',$data); // view show_add_product.php
	 }


	 public function addProduct(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }		
                // #### validate form #### //
		$this->load->library('form_validation');
		$this->form_validation->set_rules('code_id','Code ID','trim|required');
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('price','Price','trim|required');
                $this->form_validation->set_error_delimiters('<label class="validate_error">','</label>');

		//$this->form_validation->set_rules('amount','Amount','trim|required');
		


		if($this->form_validation->run() == FALSE){                     // check validation form
			$this->showAddProduct();				// call view show_add_product
		}else if(! $this->check_fileUpload()){
			$this->showAddProduct();
		}else{								// validattion success
			$this->process_fileUpload();
			$date = "%Y-%m-%d | %H:%i:%s";
			$time = time();
			$code_id 	= $this->input->post('code_id');
			$name_p		= $this->input->post('name');
			$price_p 	= $this->input->post('price');
			$detail_p 	= $this->input->post('detail');
			$picture_p 	= $_FILES["upload_img"]["name"];
	
			//$total_p 	= $this->input->post('amount');
			$date		= mdate($date, $time);                  // get date
			
			if( ! $this->main_product_model->isFoundCheckProductCodeId($code_id) ){ // check Is code id exist in database. ?
                            
                            // #### prepare data of tabl_product #### //
                            $data = array('table1' => array('code_id'=> $code_id,
                                                            'name_p' => $name_p,
                                                            'price_p' => $price_p,
                                                            'detail_p' => $detail_p,
                                                            'picture_p' => $picture_p,
                                                            'date' => $date,
                                                            )
                                          );
                            $res = $this->main_product_model->insertProduct($data); // insert product
                            if($res){ // success
                                $this->index();
                            }
			}else{ // error
				$this->data['error'] = "code id duplicate";
				$this->showAddProduct();
			}

		}

	 }



	/* delete */

	public function deleteProduct(){

		$id_product = $_GET['id_product'];
		$this->main_product_model->deleteProduct($id_product); // process delete
		redirect('product/main_product_controller','refresh');
	}
	/* ---- edit ----*/

	public function showEditProduct(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }
		$id_product = $this->input->get('id_product');
		
		$date = "%Y-%m-%d %H:%i:%s";
		$time = now();
		$query = $this->main_product_model->getDataProductById($id_product); // get only data product


		$data['date'] =  mdate($date, $time);
		$data['query']=  $query->row(); // store data one row


	
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");

		$this->load->helper('form');
		$this->load->view('product/show_edit_product',$data); // view show_edit_product.php

	}
	public function editProduct(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }
			
		$this->load->library('form_validation');
		$codeId_original = $this->input->post('code_id_original',true);
		
		if($codeId_original !== $this->input->post('code_id',true)){    // check code id
			$this->form_validation->set_rules('code_id', 'Code_id', 'trim|required|xss_clean|callback_verifyCodeID');
			$codeId		= $this->input->post('code_id',true);
		}else{
			$codeId		 = $this->input->post('code_id_original',true);
		}
                // #### form validation #### //
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
                $this->form_validation->set_error_delimiters('<label class="validate_error">','</label>');
		if( $this->form_validation->run() == false ){ // if form fail
			$_GET['id_product'] =  $this->input->post('id_product',true);
			
			$this->showEditProduct();
		}else{ // form success
			$id_product = $this->input->post('id_product',true);
			$name = $this->input->post('name',true);
			$price = $this->input->post('price',true);
			$detail = $this->input->post('detail',true);
			$img_path = $this->input->post('img_path',true);
			
			$data = array( 'code_id' => $codeId ,
                                        'name_p'  => $name,
                                        'price_p' => $price,
                                        'detail_p'=> $detail,
                                        'picture_p'=> $img_path
                                    );

			$this->main_product_model->updateProduct($id_product,$data); // update data
			$this->process_fileUpload($img_path);
			redirect('product/main_product_controller/', 'refresh');
		}
	}

	public function showPrintProduct(){   // print function
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                        $data['session'] = $this->session->userdata('logged_in');   
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
			$data['query']=  $this->main_product_model->getAllProductData()->result(); // get all data product
			$data['summary'] = $this->main_product_model->getProductSummary()->row(); // get summary data product
			$this->load->view('product/show_print_product',$data);	 // view show_print_product.php
		}		
	
	}

	public function verifyCodeID($code){ // check code id
		if($this->main_product_model->isFoundCheckProductCodeId($code)){ // check Is code_id exist in database. 
			$this->form_validation->set_message('verifyCodeID', 'code duplicate please new changed');
			return false;
		}else{ return true; }
	}


	/* --- helper ---*/
	public function process_fileUpload($filename = null){ // process upload image
			$config['upload_path'] = 'assets/imgs/product';
			$config['allowed_types'] = 'gif|jpg|png';
			//$config['max_size']	= '2048000';
			if(!empty( $filename ) ){
				$config['file_name'] = $filename;
			}
			
			$config['overwrite'] = true;

			$this->load->library('upload', $config);
			
			if( $this->upload->do_upload('upload_img') ){
				return true;
			}else{
				return false;
			}
	
	}
	 public function check_fileUpload(){ // check file upload img
		$filename = array( 'picture_p' => $_FILES["upload_img"]["name"] );

		if( empty( $_FILES["upload_img"]["name"]) ){
			$this->data['error'] = "Please input file";	
			return false;
		}else if($this->main_product_model->isFoundFileNameInProduct($filename)){
			$this->data['error'] = "img name duplicate";				
			return false;
		}else{
			return true;
		}
		
	}
}
?>