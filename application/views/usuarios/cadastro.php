<h1>Cadastro</h1>
<?php
echo form_open("usuarios/novo");

echo form_label("Nome", "nome");
echo form_input(array(
	"name" => "nome",
	"id" => "nome",
	"class" => "form-control",
	"maxlenght" => "255"
));

echo form_label("Email", "email");
echo form_input(array(
	"name" => "email",
	"id" => "email",
	"class" => "form-control",
	"maxlenght" => "255"
));

echo form_label("Senha", "senha");
echo form_password(array(
	"name" => "senha",
	"id" => "senha",
	"class" => "form-control",
	"maxlenght" => "255"
));

echo form_button(array(
	"class" => "btn btn-primary",
	"content" => "Cadastrar",
	"type" => "submit"
));

echo form_close();
?>