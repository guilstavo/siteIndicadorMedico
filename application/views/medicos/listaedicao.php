
<h1>Editar ou Excluir</h1>
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
			<?php if($this->session->userdata("usuario_logado")) : ?>
				<td><?php echo anchor("medicos/formEditar/{$medico['medid']}", 'Editar', array("class" => "btn btn-warning btn-modal", "id" => "Editar")); ?></td>
				<td><?php echo anchor("medicos/excluir/{$medico['medid']}", 'Excluir', array("class" => "btn btn-danger btn-modal", "id" => "Excluir")); ?></td>
			<?php endif; ?>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
<div class="modal fade bs-example-modal-lg" id="modalEditarCliente" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
				<h4 class="modal-title">Editar Cliente</h4>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<a href="#" class="btn btn-primary modal-submit">Salvar Alterações</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
