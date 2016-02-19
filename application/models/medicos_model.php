<?php
class Medicos_model extends CI_Model{

	public function busca($id){
		// return $this->db->get_where("medicos", array(
		// 	"id" => $id
		// ))->row_array();
		//$this->db->select('*, medicos.id AS medid, medicos.nome AS nome, especialidades.nome AS especialidade');
        $this->db->select('*, medicos.id AS medid, medicos.nome AS nome, GROUP_CONCAT(especialidades.nome) AS especialidade');
        $this->db->from('medicos');
        $this->db->join('medicos_especialidades', 'medicos.id=medicos_especialidades.id_medico', 'left');
        $this->db->join('especialidades', 'especialidades.id=medicos_especialidades.id_especialidade', 'left');
        $this->db->group_by('medid');
        $this->db->where("medicos.id", $id);
        return $query = $this->db->get()->row_array();
	}

	public function buscaTodos(){
		//return $this->db->get("medicos")->result_array();
		$this->db->select('*, medicos.id AS medid, medicos.nome AS nome, especialidades.nome AS especialidade');
        $this->db->from('medicos');
        //$this->db->join('especialidades', 'medicos.id_especialidade = especialidades.id');
        $this->db->join('medicos_especialidades', 'medicos.id=medicos_especialidades.id_medico', 'left');
        $this->db->join('especialidades', 'especialidades.id=medicos_especialidades.id_especialidade', 'left');
        //$this->db->group_by('medid');
        $this->db->order_by("especialidade", "asc");
        return $query = $this->db->get()->result_array();
	}

    public function buscaTodosComEspecialidades(){
        $this->db->select('*, medicos.id AS medid, medicos.nome AS nome, GROUP_CONCAT(especialidades.nome) AS especialidade');
        $this->db->from('medicos');
        $this->db->join('medicos_especialidades', 'medicos.id=medicos_especialidades.id_medico', 'left');
        $this->db->join('especialidades', 'especialidades.id=medicos_especialidades.id_especialidade', 'left');
        $this->db->group_by('medid');
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

	public function insert($medico){
		$this->db->insert("medicos", $medico);
        return $this->db->insert_id();
	}

    public function update($id, $medico){
        $this->db->where('id', $id);
        $this->db->update("medicos", $medico);
    }
}