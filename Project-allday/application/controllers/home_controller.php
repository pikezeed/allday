<?php // 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


session_start(); // start session
class Home_controller extends CI_Controller{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_session_helper'); // load libray session // ��Ŵ libray session
	}
	// call landing page //���¡ home page
	public function index()
	{
		if(	checkIsSession($this->session->userdata('logged_in')) ){	// check session exist // �� ����� session 
			$data['session'] = $this->session->userdata('logged_in');	// set session
			$this->load->view('home_view', $data);						// view home page
		}else{
			redirect('employee/login_emp_controller/view', 'refresh');	// session not exist go to page log in
		}
	}

	public function logout(){ 
		$this->session->unset_userdata('logged_in'); 
		session_destroy();								// clear session
		redirect('home_controller','refresh');			 
	}

	

	
	
}

?>