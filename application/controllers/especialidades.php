<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Especialidades extends Auth_Controller{

	public function novo(){
		$this->load->template("especialidades/novo");
	}

	public function addNew(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		$sucesso = $this->form_validation->run();
		if($sucesso){
			$especialidade = array(
				"nome" => $this->input->post("nome")
			);
			$this->load->model("especialidades_model");
			$this->especialidades_model->salva($especialidade);
			$this->session->set_flashdata("success", "Especialidade cadastrada com sucesso.");
			redirect("/");
		}else{
			$this->load->template("especialidades/novo");
		}	
	}
}