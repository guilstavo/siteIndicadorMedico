<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medicos extends CI_Controller{

	public function mostra($id){
		$this->load->model("medicos_model");
		$medico = $this->medicos_model->busca($id);
		$dados = array("medico" => $medico);
		$this->load->helper("typography");
		$this->load->template("medicos/mostra", $dados);
	}

	public function index(){
		
		$this->load->model('medicos_model');
		$medicos = $this->medicos_model->buscaTodos();
		$dados = array("medicos" => $medicos);
		$this->load->template("medicos/index.php",$dados);
		
	}

	public function formulario(){
		$this->load->template("medicos/formulario");
	}

	public function novo(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_rules("especialidade", "especialidade", "required");
		$this->form_validation->set_rules("telefone", "telefone", "required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		$sucesso = $this->form_validation->run();
		if($sucesso){
			$medico = array(
				"nome" => $this->input->post("nome"),
				"especialidade" => $this->input->post("especialidade"),
				"telefone" => $this->input->post("telefone")
			);
			$this->load->model("medicos_model");
			$this->medicos_model->salva($medico);
			$this->session->set_flashdata("success", "Médico cadastrado com sucesso.");
			redirect("/");
		}else{
			$this->load->template("medicos/formulario");
		}
		
	}
}