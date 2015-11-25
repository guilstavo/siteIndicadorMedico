<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h1>Médicos</h1>
		<table class="table">
			<?php foreach($medicos as $medico) : ?>
				<tr>
					<td><?= $medico['nome'] ?></td>
					<td><?= $medico['especialidade'] ?></td>
					<td><?= $medico['telefone'] ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>
</html>