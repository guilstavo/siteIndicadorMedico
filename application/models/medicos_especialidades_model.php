<?php
class Medicos_especialidades_model extends CI_Model{

	public function busca($id){
		return $this->db->get_where("medicos_especialidades", array(
			"id" => $id
		))->row_array();
	}

	public function buscaTodos(){
		return $this->db->get("medicos_especialidades")->result_array();
	}

	public function insert($medico_especialidade){
		$this->db->insert("medicos_especialidades", $medico_especialidade);
		return $this->db->insert_id();
	}

	public function deleteMedico($id_medico){
		return $this->db->delete('medicos_especialidades', array('id_medico' => $id_medico));
	}
}