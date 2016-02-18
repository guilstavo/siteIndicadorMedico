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

	public function buscaTodosUsados(){
		$this->db->select('especialidades.id, especialidades.nome');
        //$this->db->select('*');
        $this->db->from('especialidades');
        $this->db->join('medicos_especialidades', 'especialidades.id=medicos_especialidades.id_especialidade', 'left');
        $this->db->where('id_especialidade !=', 'null');
        $this->db->group_by('medicos_especialidades.id_especialidade'); 
        $this->db->order_by("especialidades.nome", "asc");
        return $query = $this->db->get()->result_array();
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