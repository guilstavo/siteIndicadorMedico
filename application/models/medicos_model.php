<?php
class Medicos_model extends CI_Model{

	public function busca($id){
		return $this->db->get_where("medicos", array(
			"id" => $id
		))->row_array();
	}

	public function buscaTodos(){
		return $this->db->get("medicos")->result_array();
	}

	public function salva($medico){
		$this->db->insert("medicos", $medico);
	}
}