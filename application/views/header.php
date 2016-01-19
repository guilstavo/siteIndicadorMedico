<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
	<link rel="stylesheet" href="<?= base_url("css/style.css") ?>">
</head>
<body>
	<div class="container">
		<?= anchor('http://apmsantos.org.br/indicadorMedico/', img(array(
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