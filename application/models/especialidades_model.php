<?php
class Especialidades_model extends CI_Model{

	public function busca($id){
		return $this->db->get_where("especialidades", array(
			"id" => $id
		))->row_array();
	}

	public function buscaTodos(){
		return $this->db->get("especialidades")->result_array();
	}

	public function buscaDropdown(){
		$this->db->select('id, nome');
        $this->db->from('especialidades');
		$query = $this->db->get();
		$dropdown = array();
		foreach ($query->result() as $row){
		   $dropdown[$row->id] = $row->nome;
		}
		return $dropdown;
	}

	public function salva($especialidade){
		$this->db->insert("especialidades", $especialidade);
	}
}