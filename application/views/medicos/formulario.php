<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
</head>
<body>
	<div class="container">
		<h1>Cadastro de Médicos</h1>
	<?php
	echo form_open("medicos/novo");

	echo form_label("Nome", "nome");
	echo form_input(array(
		"name" => "nome",
		"id" => "nome",
		"class" => "form-control",
		"maxlenght" => "255"
	));

	echo form_label("Especialidade", "especialidade");
	echo form_input(array(
		"name" => "especialidade",
		"id" => "especialidade",
		"class" => "form-control",
		"maxlenght" => "255"
	));

	echo form_label("Telefone", "telefone");
	echo form_input(array(
		"name" => "telefone",
		"id" => "telefone",
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
	</div>
</body>
</html>