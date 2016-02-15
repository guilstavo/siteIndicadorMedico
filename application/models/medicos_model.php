<?php
class Medicos_model extends CI_Model{

	public function busca($id){
		// return $this->db->get_where("medicos", array(
		// 	"id" => $id
		// ))->row_array();
		$this->db->select('*, medicos.id AS medid, medicos.nome AS nome, especialidades.nome AS especialidade');
        $this->db->from('medicos');
        $this->db->join('especialidades', 'medicos.id_especialidade = especialidades.id');
        $this->db->where("medicos.id", $id);
        return $query = $this->db->get()->row_array();
	}

	public function buscaTodos(){
		//return $this->db->get("medicos")->result_array();
		$this->db->select('*, medicos.id AS medid, medicos.nome AS nome, especialidades.nome AS especialidade');
        $this->db->from('medicos');
        $this->db->join('especialidades', 'medicos.id_especialidade = especialidades.id');
        $this->db->order_by("especialidade", "asc");
        return $query = $this->db->get()->result_array();
	}

	function getJson() {
        $this->db->select('nome');
        $this->db->from('medicos');
        //$this->db->where('table_1.column_name', $uniq_id);
        $query = $this->db->get();
        foreach($query->result() as $row)
        {
           $retorno = json_encode($row);
        } 
        return $retorno;
    }

	public function salva($medico){
		$this->db->insert("medicos", $medico);
	}
}