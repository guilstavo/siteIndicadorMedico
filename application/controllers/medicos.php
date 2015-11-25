<?php

class Medicos extends CI_Controller{

	public function index(){
		$medicos = array();
		$medico1 = array("nome" => "José", "especialidade" => "medico", "telefone" => "(13)3232-3232");
		$medico2 = array("nome" => "João", "especialidade" => "medico", "telefone" => "(13)3232-3232");
		array_push($medicos, $medico1, $medico2);
	
		$dados = array("medicos" => $medicos);
		$this->load->view("medicos/index.php",$dados);
	}
}