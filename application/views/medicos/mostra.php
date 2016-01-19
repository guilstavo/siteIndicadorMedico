
<h1><?= html_escape($medico["nome"]); ?></h1><br>
Especialidade: <?= html_escape($medico["especialidade"]); ?><br>
Telefone: <?= auto_typography(html_escape($medico["telefone"])); ?>
