
<h1>Cadastro de Especialidade</h1>
<?php
echo form_open("especialidades/addNew");

echo form_hidden("data_criacao", date("Y-m-d H:i:s"));

echo form_label("Nome", "nome");
echo form_input(array(
	"name" => "nome",
	"id" => "nome",
	"class" => "form-control",
	"maxlenght" => "255",
	"value" => set_value("nome", "")
));
echo form_error("nome");

echo form_button(array(
	"class" => "btn btn-primary",
	"content" => "Cadastrar",
	"type" => "submit"
));

echo form_close();
?>