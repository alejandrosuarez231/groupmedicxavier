<div id="mdCategoriePlus" class="modal fade in">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-teal-600">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title"><i class="icon-plus-circle2"></i> &nbsp;Agregar Nuevas Categorias de Artículos</h5>
			</div>

			{!! Form::open(['route' => 'web.articles.categories.store', 'class' => 'form-horizontal', 'id' => 'frmCategorie']) !!}
			<div class="modal-body">
				<div class="form-group form-group-sm">
					{!! Form::label('categorie', 'Categoria', ['class' => 'control-label col-sm-3']) !!}
					<div class="col-sm-9">
						{!! Form::text('categorie', null, ['class' => 'form-control input-roundless']) !!}
					</div>
				</div>

				<div class="form-group form-group-sm">
					{!! Form::label('description', 'Descripción', ['class' => 'control-label col-sm-3']) !!}
					<div class="col-sm-9">
						{!! Form::text('description', null, ['class' => 'form-control input-roundless']) !!}
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="submit" class="btn border-slate text-slate-800 btn-flat"><i class="icon-plus-circle2 position-left"></i> Guardar</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>