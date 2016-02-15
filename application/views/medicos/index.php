<h1>Médicos</h1>
<table class="table">
	<thead>
	<tr>
		<th>Nome</th>
		<th>Especialidade</th>
		<th>Telefone</th>
		<th>Endereço</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($medicos as $medico) : ?>
		<tr>
			<td><?= anchor("medicos/{$medico['medid']}", html_escape($medico['nome'])) ?></td>
			<td><?= html_escape($medico['especialidade']) ?></td>
			<td><?= html_escape($medico['telefone']) ?></td>
			<td><?= html_escape($medico['endereco']) ?></td>
		</tr>
	<?php endforeach ?>
		</tbody>
</table>
