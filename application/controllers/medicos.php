<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medicos extends CI_Controller{

	public function index(){
		
		$this->load->model('medicos_model');
		$medicos = $this->medicos_model->buscaTodos();

		$dados = array("medicos" => $medicos);
		$this->load->helper(array("form"));
		$this->load->view("medicos/index.php",$dados);
	}
}