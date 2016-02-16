$(document).ready(function(){
	$('.btn-modal').on('click', function(e){
		e.preventDefault();
		var href = $(this).attr('href');
		var id = $(this).attr('id');
		$('.modal-submit').html(id);
		$('.modal-title').html(id);
		if(id == 'Editar'){
			$('.modal-body').load(href);
			$( ".submit-form" ).hide();
			$('.modal-submit').on('click', function(e){
				e.preventDefault();
				$( ".submit-form" ).trigger( "click" );
			});
		}else if(id == 'Excluir'){
			$('.modal-body').html('Você tem certeza que deseja excluir esse médico?');
			$('.modal-submit').attr('href', href);
		}
		$('#modalEditarCliente').modal('show');
	});
});