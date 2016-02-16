<h1>Cadastro de Médicos</h1>
<?php
echo form_open("medicos/insertUpdate");

echo form_hidden("id", (isset($medico['medid']) ? $medico['medid'] : "0"));

echo form_label("Nome", "nome");
echo form_input(array(
	"name" => "nome",
	"id" => "nome",
	"class" => "form-control",
	"maxlenght" => "255",
	"value" => set_value("nome", (isset($medico['nome']) ? $medico['nome'] : ""))
));
echo form_error("nome");

echo form_label("Especialidade", "id_especialidade");
echo form_dropdown('id_especialidade', $especialidades, (isset($medico['id_especialidade']) ? $medico['id_especialidade'] : ""), 'class="form-control" id="id_especialidade"');
echo form_error("id_especialidade");

echo form_label("Endereço", "endereco");
echo form_input(array(
	"name" => "endereco",
	"id" => "endereco",
	"class" => "form-control",
	"maxlenght" => "255",
	"value" => set_value("endereco", (isset($medico['endereco']) ? $medico['endereco'] : ""))
));
echo form_error("endereco");

echo form_label("Telefone", "telefone");
echo form_input(array(
	"name" => "telefone",
	"id" => "telefone",
	"class" => "form-control",
	"maxlenght" => "255",
	"value" => set_value("telefone", (isset($medico['telefone']) ? $medico['telefone'] : ""))
));
echo form_error("telefone");

echo form_label("CRM", "crm");
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