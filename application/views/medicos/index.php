<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
</head>
<body>
	<div class="container">
		
		<?php if($this->session->flashdata("success")) : ?>
			<p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
		<?php endif ?>
		<?php if($this->session->flashdata("danger")) : ?>
			<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
		<?php endif ?>

		<h1>Médicos</h1>
		<table class="table">
			<?php foreach($medicos as $medico) : ?>
				<tr>
					<td><?= anchor("medicos/{$medico['id']}", html_escape($medico['nome'])) ?></td>
					<td><?= html_escape($medico['especialidade']) ?></td>
					<td><?= html_escape($medico['telefone']) ?></td>
				</tr>
			<?php endforeach ?>
		</table>
		<?php if($this->session->userdata("usuario_logado")) : ?>
			<?= anchor('medicos/formulario', 'Novo Médico', array("class" => "btn btn-primary")) ?>
			<?= anchor('login/logout', 'Logout', array("class" => "btn btn-primary")) ?>
		<?php else : ?>
		<h1>Login</h1>
		<?php
		echo form_open("login/autenticar");
		
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
			"content" => "Login",
			"type" => "submit"
		));

		echo form_close();
		endif;
		?>
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
	</div>
</body>
</html>