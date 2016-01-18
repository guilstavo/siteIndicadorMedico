<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Medico</title>
</head>
<body>
	<div class="container">
		<h1><?= html_escape($medico["nome"]); ?></h1><br>
		Especialidade: <?= html_escape($medico["especialidade"]); ?><br>
		Telefone: <?= auto_typography(html_escape($medico["telefone"])); ?>
	</div>
</body>
</html>