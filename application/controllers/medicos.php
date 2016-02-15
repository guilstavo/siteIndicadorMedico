<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medicos extends CI_Controller{

	public function mostra($id){
		$this->load->model("medicos_model");
		$medico = $this->medicos_model->busca($id);
		

		$this->load->library('googlemaps');

		$config['zoom'] = 'auto';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $medico['latitude'].', '.$medico['longitude'];
		$this->googlemaps->add_marker($marker);

		$dados = array(
			"medico" => $medico, 
			"map" => $this->googlemaps->create_map()
		);
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
		if($this->session->userdata("usuario_logado")){
			$this->load->model("especialidades_model");
			$especialidades = $this->especialidades_model->buscaDropdown();
			$dados = array("especialidades" => $especialidades);
			$this->load->template("medicos/formulario", $dados);
		}else{
			redirect('login');
		}
		
	}

	public function novo(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("nome", "nome", "required");
		$this->form_validation->set_rules("id_especialidade", "id_especialidade", "required");
		$this->form_validation->set_rules("telefone", "telefone", "required");
		$this->form_validation->set_rules("endereco", "endereco", "required");
		$this->form_validation->set_rules("crm", "crm", "required");
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
		$sucesso = $this->form_validation->run();
		if($sucesso){
			$position = $this->getPosition($this->fixCapitalize($this->input->post("endereco")));
			$medico = array(
				"nome" => $this->fixCapitalize($this->input->post("nome")),
				"id_especialidade" => $this->input->post("id_especialidade"),
				"telefone" => $this->input->post("telefone"),
				"endereco" => $this->fixCapitalize($this->input->post("endereco")),
				"crm" => $this->input->post("crm"),
				"latitude" => $position['latitude'],
				"longitude" => $position['longitude']
			);
			$this->load->model("medicos_model");
			$this->medicos_model->salva($medico);
			$this->session->set_flashdata("success", "Médico cadastrado com sucesso.");
			redirect("/");
		}else{
			$this->load->template("medicos/formulario");
		}
		
	}

	private function fixCapitalize($str){
		$str = mb_strtolower($str, 'UTF-8');
		$strArr = explode(" ", $str);
		$fixedStr = '';
		foreach ($strArr as $word) {
			$fixedStr .= ucfirst($word);
			if (end($strArr)){
				$fixedStr .= ' ';
			}
			
		}
		return $fixedStr;
	}

	private function getPosition($address){
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        $output= json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;
        $position = array(
        	'latitude' => $latitude,
        	'longitude' => $longitude
        	);
        return $position;
	}
}