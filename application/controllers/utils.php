<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utils extends Auth_Controller{
	public function migrate(){
		$this->load->library("migration");
		$success = $this->migration->current();
		if($success){
			echo 'migrado';
		}else{
			show_error($this->migration->error_string());
		}
	}
}