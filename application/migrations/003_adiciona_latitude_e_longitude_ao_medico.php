<?php
class Migration_Adiciona_latitude_e_longitude_ao_medico extends CI_Migration{
	public function up(){
		$this->dbforge->add_column('medicos', array(
			'latitude' => array(
				'type' => 'float'
			),
			'longitude' => array(
				'type' => 'float'
			)
		));
	}
	public function down(){
		$this->dbforge->drop_column('medicos', 'latitude');
		$this->dbforge->drop_column('medicos', 'longitude');
	}
}