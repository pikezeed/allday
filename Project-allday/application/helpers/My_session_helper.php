<?php 
if( !defined('BASEPATH') ) exit('No direct script access allowed');
	function checkIsSession($session){
		if( $session ){
			return true;

		}else{
			return false;
		}
	}
?>