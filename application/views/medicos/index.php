<?php if($this->session->userdata("usuario_logado")) : ?>
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
	<?= anchor('medicos/formulario', 'Novo Médico', array("class" => "btn btn-primary")) ?>
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