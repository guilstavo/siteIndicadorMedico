<h1>Cadastro de Médicos</h1>
<?php
echo form_open("medicos/insertUpdate");

echo form_hidden("id", (isset($medico['medid']) ? $medico['medid'] : "0"));

echo form_label("Nome", "nome", array('class' => 'form_label'));
echo form_input(array(
	"name" => "nome",
	"id" => "nome",
	"class" => "form-control",
	"maxlenght" => "255",
	"value" => set_value("nome", (isset($medico['nome']) ? $medico['nome'] : ""))
));
echo form_error("nome");

echo form_label("Especialidade", "id_especialidade");
echo "<br />";
$data = array();
$medicoEspecialidades = isset($medico['especialidade']) ? explode(',', $medico['especialidade']) : array();
foreach ($especialidades as $especialidade) {
	//$check = ($medico['id_especialidade'] == $especialidade ? TRUE : FALSE);
	$check = in_array($especialidade['nome'], $medicoEspecialidades) ? 'TRUE' : FALSE;
	$data = array(
			'name'        => 'id_especialidade[]',
		    'value'       => $especialidade['id'],
		    'checked'     => $check,
		    'class'       => 'checkbox_especialidade'
		);
	echo form_label(form_checkbox($data) . $especialidade['nome'], "Especialidade", array('class' => 'checkbox col-sm-3 col-xs-12'));
};
echo form_error("id_especialidade");
echo "<br />";

echo form_label("Endereço", "endereco", array('class' => 'form_label'));
echo form_input(array(
	"name" => "endereco",
	"id" => "endereco",
	"class" => "form-control",
	"maxlenght" => "255",
	"value" => set_value("endereco", (isset($medico['endereco']) ? $medico['endereco'] : ""))
));
echo form_error("endereco");

echo form_label("Telefone", "telefone", array('class' => 'form_label'));
echo form_input(array(
	"name" => "telefone",
	"id" => "telefone",
	"class" => "form-control",
	"maxlenght" => "255",
	"value" => set_value("telefone", (isset($medico['telefone']) ? $medico['telefone'] : ""))
));
echo form_error("telefone");

echo form_label("CRM", "crm", array('class' => 'form_label'));
echo form_input(array(
	"name" => "crm",
	"id" => "crm",
	"class" => "form-control",
	"maxlenght" => "7",
	"value" => set_value("crm", (isset($medico['crm']) ? $medico['crm'] : ""))
));
echo form_error("crm");

echo form_button(array(
	"class" => "btn btn-primary submit-form",
	"content" => "Cadastrar",
	"type" => "submit"
));

echo form_close();
?>