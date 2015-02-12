<?php 
class My_Loader extends CI_Loader{
	public function __construct(){
		parent::__construct();
	}

	public function iface_model($strInterfaceName){
		require_once APPPATH.'/interfaces/model/'.$strInterfaceName.'.php';
	}

}

?>