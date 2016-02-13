<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WebService extends CI_Controller{

	public function index(){
		$this->load->model('medicos_model');
		$medicos = $this->medicos_model->buscaTodos();
		//$dados = json_encode($medicos, JSON_UNESCAPED_UNICODE);
		$dados = json_encode($medicos);
		$dados = array("service" => $dados);
		$this->load->view("webservice/index.php",$dados);
	}

}