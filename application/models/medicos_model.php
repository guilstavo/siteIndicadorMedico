<?php
class Medicos_model extends CI_Model{
	public function buscaTodos(){
		return $this->db->get("medicos")->result_array();
	}
}