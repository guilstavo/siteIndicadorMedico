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