<?php
class Main_emp_controller extends CI_Controller{
	private $data;
	


	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_session_helper');       // import function session into this page
		$this->load->helper('date');                    // import function date
		$this->load->model('employee/main_emp_model');  // import employee model
                
                
	} 

	public function index(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){    // check exist session
                    redirect('employee/login_emp_controller/view', 'refresh');  // not have session
                }else{                                                              
                    $data['session'] = $this->session->userdata('logged_in');   // store session to variable
                }
                
		$data['query']   = $this->main_emp_model->getAllEmpData();      // get all data employee
                 
		if( !empty($this->data['error']) ){                             // check data error
			$data['error'] = $this->data['error'];                  
		} 
		if( empty($data['query']) ){                                    // check data empty
			$this->load->helper('form');
			$this->load->view('employee/main_emp_view',$data);      
		}else{                                                          // data success
			$this->load->helper('form');                        
			$this->load->view('employee/main_emp_view',$data);      // pass argument(value) to main_emp_view.php
		}
	}
	public function searchByLike(){                                         // search data
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }
		$code = $this->input->post('code',true);
		$name = $this->input->post('name',true);
		$surname = $this->input->post('surname',true);
		$arrayLike = array('name'=> $name, 'surname' => $surname, 'emp_number' => $code);
	
		$data['query'] = $this->main_emp_model->getAllEmpDataByLike($arrayLike); // get data from function search
		if(!$data['query']){                                            // not found
                        $this->load->helper('form');	
			$this->load->view('employee/main_emp_view',$data);
		}else{
			$this->load->helper('form');
			$this->load->view('employee/main_emp_view',$data);      // success pass to main_emp_view.php
		}
	}





	public function viewInsertEmp(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }


		
		$this->load->helper(array('form','url'));
		$this->load->view('employee/insert_emp_view');                  // pass to insert_emp_view.php

	
	}
	

	public function printDetailEmp(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }
		$data['query'] = $this->main_emp_model->getAllEmpData();        // get all data employee
                $data['total'] = $this->main_emp_model->getTotalRows();         // get total all data employee
		if( empty($data['query']) ){                                    // data empty
			$this->load->helper('form');
			$data['error'] = "ไม่พบข้อมูล";
			$this->load->view('employee/print_emp_view',$data);
		}else{                                                          // success
			$this->load->helper('date');
			$data['img_date'] =  mdate("%Y-%m-%d %h:%i:%s");
			$this->load->helper(array('form','url'));
			$this->load->view('employee/print_emp_view',$data);     // pass to print_emp_view.php
		}

	
	}
	public function viewDetailEmp(){                                        // show detail employee
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }
		$id = $this->input->get('id_emp',true);
		$data['query'] = $this->main_emp_model->getEmpDataById($id);    // get only data employee 
		
                // #### clear cahe picture #### //
		$this->load->helper('date');
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		
		$data['img_date'] =  mdate("%Y-%m-%d %h:%i:%s");
		$this->load->helper(array('form','url'));
		$this->load->view('employee/detail_emp_view',$data);            // pass argument to detail_emp_view.php

	}

	public function viewEditEmp(){                                          // show form edit employee
		if(!checkIsSession($this->session->userdata('logged_in')) ){    
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }
		$this->load->helper(array('form','url'));
		$id = $this->input->get('id_emp',true);
		$data['query'] = $this->main_emp_model->getEmpDataById($id);    // get only data employee
		if( !empty($this->data['error']) ){
			$data['error'] = $this->data['error'];
		}
		$this->load->helper('date');
		//$this->output->set_header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		$this->output->set_header('Last-modified:'.gmdate('D,d M Y H:i:s', time()).'GMT');
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
		
		$data['img_date'] =  mdate("%Y-%m-%d %h:%i:%s");

		$this->load->helper(array('form','url'));
		$this->load->view('employee/edit_emp_view',$data);              // pass to edit_emp_view
	
	}




	public function editEmp(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }
		$this->load->library('form_validation');                        // [open] how to check validation form 
		$id_code_original = $this->input->post('id_code_original',true);// get parameter
	
		if($id_code_original !== $this->input->post('code',true)){
		
			$this->form_validation->set_rules('code', 'Code',			'trim|required|xss_clean|callback_check_codeEmp'); // validate text field code
			$code	= $this->input->post('code',true);
		}else{

			$code	= $this->input->post('id_code_original',true);
		}


		$this->form_validation->set_rules('username',		'Username',		'trim|required|xss_clean');         // validate textfield username
		$this->form_validation->set_rules('password',		'Password',		'trim|required|xss_clean');         // validate textfield password
		$this->form_validation->set_rules('name',			'Name',			'trim|required|xss_clean'); // validate textfield name
		$this->form_validation->set_rules('address',		'Address',			'trim|required|xss_clean'); // validate textfield address
		$this->form_validation->set_rules('surname',		'Surname',		'trim|required|xss_clean');         // validate textfield surname
		$this->form_validation->set_rules('email',			'Email',		'trim|xss_clean');          // validate textfield email
		$this->form_validation->set_rules('tel',			'Tel',			'trim|required|xss_clean'); // validate textfield tel
		$this->form_validation->set_rules('sex',			'Sex',			'trim|required|xss_clean'); // validate textfield sex

                // ##### start get parametor come from to form ##### //
		$id_authen	= $this->input->post('id_authen',true);
		$id_emp	    = $this->input->post('id_emp',true);
		
		$username	= $this->input->post('username',true);
		$password	= $this->input->post('password',true);
		$name		= $this->input->post('name',true);
		$surname	= $this->input->post('surname',true);
		$address	= $this->input->post('address',true);
		$email		= $this->input->post('email',true);
		$tel		= $this->input->post('tel',true);
		$sex		= $this->input->post('sex',true);
		$date_start	= $this->input->post('date',true);
		$id_permission = $this->input->post('id_permission',true);
		$img		= $this->input->post('img',true);
		// ##### end get parametor come from to form ##### //
                
                // #### set argument[parameter] each tbl_employee and tbl_authen #### //
		$data = array('table1' => array('emp_number'=>	$code,
                                                'name'	=>	$name,
                                                'surname' => $surname,
                                                'address' => $address,
                                                'email' => $email,
                                                'tel' => $tel,
                                                'sex' => $sex,
                                                'date_start' => $date_start,
                                                'img_path' => $img,
                                                'id_permission' => $id_permission
                                                ),
                            'table2' => array( 
                                                'username'	=>	$username,
                                                'password'	=>	$password,
                                               ),
                            );
		//#### check validate form ####//
		if( $this->form_validation->run() == false ){                   // error
			$_GET['id_emp'] =  $this->input->post('id_emp',true);
			$this->viewEditEmp();

		}else                                                           // success
		{
			if(!$this->main_emp_model->updateEmpData($id_emp, $data)){ // update date employeee
				$this->data['error'] = "insert is promblem , Please try again"; // receive code id new again
				$_GET['id_emp'] =  $this->input->post('id_emp',true);
				$this->viewEditEmp();

			}else{
				$this->process_fileUpload($img);                // upload picture
				redirect('employee/main_emp_controller/', 'refresh');
			}

		}

	}
	public function insertEmp(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }
                
		$this->load->library('form_validation');
		$this->form_validation->set_rules('code',			'Code',			'trim|required|xss_clean|callback_check_codeEmp');
		$this->form_validation->set_rules('username',		'Username',		'trim|required|xss_clean');
		$this->form_validation->set_rules('password',		'Password',		'trim|required|xss_clean');
		$this->form_validation->set_rules('name',			'Name',			'trim|required|xss_clean');
		$this->form_validation->set_rules('surname',		'Surname',		'trim|required|xss_clean');
		$this->form_validation->set_rules('address',		'Address',		'trim|required|xss_clean');
		$this->form_validation->set_rules('email',			'Email',		'trim|xss_clean');
		$this->form_validation->set_rules('tel',			'Tel',			'trim|required|xss_clean');
		$this->form_validation->set_rules('sex',			'Sex',			'trim|required|xss_clean');
		
		$this->form_validation->set_error_delimiters('<label class="validate_error">','</label>');


		if( $this->form_validation->run() == false ){
			
			$this->load->view('employee/insert_emp_view');
		
		}else if(! $this->check_fileUpload()){
			$this->load->view('employee/insert_emp_view',$this->data);
		}else
		{
			$code		= $this->input->post('code',true);
			$username	= $this->input->post('username',true);
			$password	= $this->input->post('password',true);
			$name		= $this->input->post('name',true);
			$surname	= $this->input->post('surname',true);
			$address	= $this->input->post('address',true);
			$email		= $this->input->post('email',true);
			$tel		= $this->input->post('tel',true);
			$sex		= $this->input->post('sex',true);
			$date_start	= mdate("%Y-%m-%d %h:%i:%s");
			$id_permission = $this->input->post('id_permission',true);
			$img_path = $_FILES["upload_img"]["name"];              // get name come from upload img
			
                        // #### set argument tbl_employee and tbl_authen #### //
			$data = array('table1' => array('emp_number'=>	$code,
                                                        'name'	=>	$name,
                                                        'surname' => $surname,
                                                        'address' => $address,
                                                        'email' => $email,
                                                        'tel' => $tel,
                                                        'sex' => $sex,
                                                        'date_start' => $date_start,
                                                        'img_path' => $img_path,
                                                        'id_permission' => $id_permission
                                                        ),
                                    'table2' => array( 
                                                        'username'	=>	$username,
                                                        'password'	=>	$password,
                                                        'id_emp'	=>	null
                                                       ),
                                    );
                        
                        // #### insert data employee #### //
			if(!$this->main_emp_model->insertEmpData($data)){
				$this->data['error'] = "insert is promblem , Please try again";
				$this->index();
				//$this->load->view('employee/insert_emp_view');
			}else{ 
				$this->process_fileUpload();    // start upload img
				$this->index();                 // pass to function index
			}		
		}
	}
	


	public function deleteEmp(){
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			redirect('employee/login_emp_controller/view', 'refresh');
		}else{
                    $data['session'] = $this->session->userdata('logged_in');    
                }
		
		$id_emp = $this->input->get('id_emp',true);
                //#### delete employee #### //
		if(!$this->main_emp_model->deleteEmpData( $id_emp )){           
			$this->data['error'] = "delete promblem, Please try again";
			redirect('employee/main_emp_controller', 'refresh');
		}else{
			redirect('employee/main_emp_controller', 'refresh'); // success
		}
			
		
	}

/*-------------------- helpper ------------------------*/
        // #### validation upload image #### //
	public function check_fileUpload(){
		$col = array( 'img_path' => $_FILES["upload_img"]["name"] );

		if( empty( $_FILES["upload_img"]["name"]) ){
			$this->data['error'] = "Please input file";	
			return false;
		}else if(!$this->main_emp_model->checkExistEmpByCol($col)){
			$this->data['error'] = "img name duplicate";	
			return false;
		}
			return true;
		
	}
        
        // #### process upload image #### //
	public function process_fileUpload($filename = null){
			$config['upload_path'] = 'assets/imgs/employee';
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

        // #### check exist code employee #### //
	public function check_codeEmp($code){
		$col = array( 'emp_number' => $code );
		if(!$this->main_emp_model->checkExistEmpByCol($col) ){
			$this->form_validation->set_message('check_codeEmp', 'code duplicate please new changed');	
			return false;
		}else{
			return true;
		}
	}
}
?>