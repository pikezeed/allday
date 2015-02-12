<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


session_start(); //we need to call PHP's session object to access it through CI
class Home_controller extends CI_Controller{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_session_helper'); // checkIsSession
	}
	public function index()
	{
		if(	checkIsSession($this->session->userdata('logged_in')) ){
			$data['session'] = $this->session->userdata('logged_in');
			$this->load->view('home_view', $data);
		}else{
			redirect('employee/login_emp_controller/view', 'refresh');
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home_controller','refresh');
	}

	

	
	
}

?>