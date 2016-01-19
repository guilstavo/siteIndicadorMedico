<?php
class Migration_Adiciona_endereco_e_data_ao_medico extends CI_Migration{
	public function up(){
		$this->dbforge->add_column('medicos', array(
			'endereco' => array(
				'type' => 'varchar',
				'constraint' => '255',
			),
			'data_criacao' => array(
				'type' => 'DATE'
			),
			'data_ultima_alteracao' => array(
				'type' => 'DATE'
			)
		));
	}
	public function down(){
		$this->dbforge->drop_column('medicos', 'endereco');
		$this->dbforge->drop_column('medicos', 'data_criacao');
		$this->dbforge->drop_column('medicos', 'data_ultima_alteracao');
	}
}