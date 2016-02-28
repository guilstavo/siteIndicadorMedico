<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class WebService extends CI_Controller{

	public function index(){
		$this->load->model('medicos_model');
		$medicos = $this->medicos_model->buscaTodos();
		//$dados = json_encode($medicos, JSON_UNESCAPED_UNICODE);
		$dados = json_encode($medicos);
		$dados = array("service" => $dados);
		$this->load->view("webservice/index.php",$dados);
	}

	public function especialidades(){
		$this->load->model('especialidades_model');
		$especialidades = $this->especialidades_model->buscaTodosUsados();
		//$dados = json_encode($medicos, JSON_UNESCAPED_UNICODE);
		$dados = json_encode($especialidades);
		$dados = array("service" => $dados);
		$this->load->view("webservice/index.php",$dados);
	}

	public function medicosEspecialistas($id){
		$this->load->model('medicos_model');
		$medicos = $this->medicos_model->buscaMedicosDeEspecialidade($id);
		//$dados = json_encode($medicos, JSON_UNESCAPED_UNICODE);
		$dados = json_encode($medicos);
		$dados = array("service" => $dados);
		$this->load->view("webservice/index.php",$dados);
	}

	public function medico($id){
		$this->load->model('medicos_model');
		$medico = $this->medicos_model->busca($id);
		//$dados = json_encode($medicos, JSON_UNESCAPED_UNICODE);
		$dados = json_encode($medico);
		$dados = array("service" => $dados);
		$this->load->view("webservice/index.php",$dados);
	}

}