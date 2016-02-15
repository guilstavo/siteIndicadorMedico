<?php
class Migration_Adiciona_crm_ao_medico extends CI_Migration{
	public function up(){
		$this->dbforge->add_column('medicos', array(
			'crm' => array(
				'type' => 'int'
			)
		));
	}
	public function down(){
		$this->dbforge->drop_column('medicos', 'crm');
	}
}