<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medicos extends CI_Controller{

	public function index(){
		
		$this->load->model('medicos_model');
		$medicos = $this->medicos_model->buscaTodos();

		$dados = array("medicos" => $medicos);
		$this->load->view("medicos/index.php",$dados);
	}

	public function formulario(){
		$this->load->view("medicos/formulario");
	}

	public function novo(){
		$medico = array(
			"nome" => $this->input->post("nome"),
			"especialidade" => $this->input->post("especialidade"),
			"telefone" => $this->input->post("telefone")
		);
		$this->load->model("medicos_model");
		$this->medicos_model->salva($medico);
		$this->session->set_flashdata("success", "Médico cadastrado com sucesso.");
		redirect("/");
	}
}