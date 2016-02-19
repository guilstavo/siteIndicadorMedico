<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Indicador Médico - APM Santos</title>
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
	<link rel="stylesheet" href="<?= base_url("css/style.css") ?>">
</head>
<body>
	<?php if($this->session->userdata("usuario_logado")) : ?>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-collapse collapse" id="navbar">
			  	<ul class="nav navbar-nav">
			        <li class="active"><?= anchor(base_url(), 'Home', array("class" => "")) ?></li>
			        <li><?= anchor('cadastro', 'Novo Usuário', array("class" => "")) ?></li>
			        <li class="dropdown">
		                <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Médicos <span class="caret"></span></a>
		                <ul class="dropdown-menu">
		                  	<li><?= anchor('medicos/formulario', 'Novo Médico', array("class" => "")) ?></li>
		                  	<li><?= anchor('medicos/listaedicao', 'Editar ou Excluir', array("class" => "")) ?></li>
			        		<li><?= anchor('especialidades/novo', 'Nova Especialidade', array("class" => "")) ?></li>

		                </ul>
		            </li>
			  	</ul>
			  	<ul class="nav navbar-nav navbar-right">
					<li><?= anchor('login/logout', 'Logout', array("class" => "")) ?></li>
			  	</ul>
			</div><!--/.nav-collapse -->
    	</div>
    </nav>
    <?php endif; ?>
	<div class="container">
		<?= anchor(base_url(), img(array(
          'src' => 'images/logo.jpg',
          'alt' => 'APM Santos',
          'title' => 'APM Santos'
		)), 'class="logo"' ) ?>
		<?php if($this->session->flashdata("success")) : ?>
			<p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
		<?php endif ?>
		<?php if($this->session->flashdata("danger")) : ?>
			<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
		<?php endif ?>