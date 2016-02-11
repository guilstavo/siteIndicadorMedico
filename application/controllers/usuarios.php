<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Usuarios extends Auth_Controller{
	public function novo(){
		$usuario = array(
			"nome" => $this->input->post("nome"),
			"email" => $this->input->post("email"),
			"senha" => md5($this->input->post("senha"))
		);

		$this->load->model("usuarios_model");
		$this->usuarios_model->salva($usuario);
		$this->load->view("usuarios/novo");
	}

	public function cadastro(){
		$this->load->template("usuarios/cadastro.php");
	}
}