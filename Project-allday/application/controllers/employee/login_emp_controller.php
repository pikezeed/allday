<?php 
class Login_emp_controller extends CI_Controller{
	private $sess_array = array(
								'id_authen' => null,
								'username' => null,
								'id_permission' => null,
								'name_permission' => null,
								'id_role' => array(),
								'name_role' => array()
								);


	public function __construct(){
		parent::__construct();
		$this->load->model('employee/login_emp_model');
		$this->load->helper('my_session_helper'); // checkIsSession
	}

	public function view(){
		
		if(!checkIsSession($this->session->userdata('logged_in')) ){
			$this->load->helper(array('form'));
			$this->load->view('employee/login_emp_view');
		}else{
			redirect('home_controller', 'refresh');
		}


	
	}
	public function checkAuthentication(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
	    if($this->form_validation->run() == FALSE)
		{
			//Field validation failed.  User redirected to login page
			//echo "fail";
			$this->load->view('employee/login_emp_view');
			
		}else{
			//echo "success";
			redirect('home_controller', 'refresh');

		}



		
		
	
	}

	function check_database($password)
	{
	   try{
		   //Field validation succeeded.  Validate against database
		   $username = $this->input->post('username');
		 
		   //query the database
		   $result_emp = $this->login_emp_model->verifyEmp($username, $password);
		   if(!$result_emp){
			   throw new Exception();
		   }
		   $result_per = $this->login_emp_model->getPermission($result_emp->row()->id_permission);		// get role of permission
		   
		   if($result_emp && $result_per){

				$this->sess_array['id_authen']	  = $result_emp->row()->id_authen;
				$this->sess_array['username']		  = $result_emp->row()->username;
				$this->sess_array['id_permission']  = $result_emp->row()->id_permission;
				$this->sess_array['name_permission']= $result_emp->row()->name_permission;

						
				foreach($result_per->result() as $row){	
					echo $row->roleId;
					 array_push($this->sess_array['id_role'],$row->roleId);
					 array_push($this->sess_array['name_role'],$row->roleName);
				}
				//print_r($this->sess_array);
				$this->session->set_userdata('logged_in', $this->sess_array);
				return true;
		   }else{
				throw new Exception();
		   }	   
		   
	   }catch(Exception $ex){
		    //echo $ex;
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
	   }







	}

}
?>