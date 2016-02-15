
<h1><?= html_escape($medico["nome"]); ?></h1><br>
Especialidade: <?= html_escape($medico["especialidade"]); ?><br />
Endereço: <?= html_escape($medico["endereco"]); ?><br />
Telefone: <?= html_escape($medico["telefone"]); ?><br />
CRM: <?= html_escape($medico["crm"]); ?><br />
<br />
<?php echo $map['js']; ?>
<?php echo $map['html']; ?>