<?php
class Migration_Adiciona_tabela_especialidade extends CI_Migration{
	public function up(){
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'auto_increment' => true
			),
			'nome' => array(
				'type' => 'varchar',
				'constraint' => '255',
			),
			'data_criacao' => array(
				'type' => 'DATETIME'
			),
			'data_ultima_alteracao' => array(
				'type' => 'DATETIME'
			)

		));
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table('especialidades');
		$fields = array(
			'especialidade' => array(
				'name' => 'id_especialidade',
				'type' => 'INT',
			),
		);
		$this->dbforge->modify_column('medicos', $fields);
	}
	public function down(){
		$this->dbforge->drop_table('especialidades');
		$fields = array(
			'id_especialidade' => array(
				'name' => 'especialidade',
				'type' => 'varchar',
				'constraint' => '255'
			)
		);
		$this->dbforge->modify_column('medicos', $fields);
	}
}