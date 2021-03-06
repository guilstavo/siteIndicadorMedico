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
		$this->load->model(array('medicos_model', 'especialidades_model'));
		$medicos = $this->medicos_model->buscaTodos();
		$especialidades = $this->especialidades_model->buscaTodosUsados();
		$dados = array("medicos" => $medicos, "especialidades" => $especialidades);
		$this->load->template("medicos/index.php",$dados);
	}

	public function listaedicao(){
		$this->load->model('medicos_model');
		$medicos = $this->medicos_model->buscaTodosComEspecialidades();
		// echo '<pre>';
		// var_dump($medicos);
		// echo '</pre>';
		$dados = array("medicos" => $medicos);
		$this->load->template("medicos/listaedicao.php",$dados);
	}

	public function formulario(){
		if($this->session->userdata("usuario_logado")){
			$this->load->model("especialidades_model");
			$especialidades = $this->especialidades_model->buscaTodos();
			$dados = array("especialidades" => $especialidades);
			$this->load->template("medicos/formulario", $dados);
		}else{
			redirect('login');
		}
	}

	public function formEditar($id){
		if($this->session->userdata("usuario_logado")){
			$this->load->model("medicos_model");
			$medico = $this->medicos_model->busca($id);
			$this->load->model("especialidades_model");
			$especialidades = $this->especialidades_model->buscaTodos();
			$dados = array(
				"especialidades" => $especialidades,
				"medico" => $medico
				);
			$this->load->view("medicos/formulario", $dados);
		}else{
			redirect('login');
		}
		
	}

	public function insertUpdate(){
		if($this->session->userdata("usuario_logado")){
			$this->load->library("form_validation");
			$this->form_validation->set_rules("nome", "nome", "required");
			$this->form_validation->set_rules("id_especialidade", "id_especialidade", "required");
			$this->form_validation->set_rules("telefone", "telefone", "required");
			$this->form_validation->set_rules("endereco", "endereco", "required");
			$this->form_validation->set_rules("crm", "crm", "required");
			$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");
			$sucesso = $this->form_validation->run();
			if($sucesso){
				// echo '<pre>';
				// var_dump($this->input->post());
				// echo '</pre>';
				$position = $this->getPosition($this->fixCapitalize($this->input->post("endereco")));
				$medico = array(
					"nome" => $this->fixCapitalize($this->input->post("nome")),
					"telefone" => $this->input->post("telefone"),
					"endereco" => $this->fixCapitalize($this->input->post("endereco")),
					"crm" => $this->input->post("crm"),
					"latitude" => $position['latitude'],
					"longitude" => $position['longitude']
				);
				$especialidades = $this->input->post("id_especialidade");
				$this->load->model(array("medicos_model", "medicos_especialidades_model"));
				if($this->input->post("id") == 0){
					$id_medico = $this->medicos_model->insert($medico);
					
					$this->session->set_flashdata("success", "Médico cadastrado com sucesso.");
				}elseif($this->input->post("id") > 0){
					$id_medico = $this->input->post("id");
					$this->medicos_model->update($id_medico, $medico);
					$this->medicos_especialidades_model->deleteMedico($id_medico);
					$this->session->set_flashdata("success", "Médico editado com sucesso.");
				}
				foreach($especialidades as $especialidade){
					$medico_especialidade = array(
						"id_medico" => $id_medico,
						"id_especialidade" => $especialidade
					);
					$this->medicos_especialidades_model->insert($medico_especialidade);
				};
				redirect("/");
			}else{
				$this->load->model("especialidades_model");
				$especialidades = $this->especialidades_model->buscaDropdown();
				$dados = array(
					"especialidades" => $especialidades
				);
				$this->load->template("medicos/formulario", $dados);
			}
		}else{
			redirect('login');
		}
	}

	public function excluir($id){
		if($this->session->userdata("usuario_logado")){
			$this->load->model("medicos_especialidades_model");
			$this->db->delete('medicos', array('id' => $id));
			$this->medicos_especialidades_model->deleteMedico($id);
			$this->session->set_flashdata("success", "Médico deletado com sucesso.");
			redirect("/");
		}else{
			redirect('login');
		}
	}

	private function fixCapitalize($str){
		$str = mb_strtolower($str, 'UTF-8');
		$strArr = explode(" ", $str);
		$strArr = array_map('ucfirst', $strArr);
		return implode(" ", $strArr);
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