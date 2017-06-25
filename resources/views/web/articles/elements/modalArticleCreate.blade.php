<div id="mdArticlePlus" class="modal fade in">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-teal-600">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title"><i class="icon-plus-circle2"></i> &nbsp;Agregar Nuevos Articulos</h5>
			</div>

			{!! Form::open(['route' => 'articles.store', 'class' => 'form-horizontal', 'id' => 'frmAddArticle']) !!}
			<div class="modal-body">
				<div class="form-group form-group-sm">
					{!! Form::label('description', 'Descripción', ['class' => 'control-label col-sm-3']) !!}
					<div class="col-sm-9">
						{!! Form::text('description', null, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group form-group-sm">
					{!! Form::label('product_maker_id', 'Proveedor o Fabricante', ['class' => 'control-label col-sm-3']) !!}
					<div class="col-sm-9">
						{!! Form::select('product_maker_id', $suppliersCbo, null, ['class' => 'form-control', 'placeholder' => '']) !!}
					</div>
				</div>

				<div class="form-group form-group-sm">
					{!! Form::label('product_categorie_id', 'Categoria', ['class' => 'control-label col-sm-3']) !!}
					<div class="col-sm-9">
						{!! Form::select('product_categorie_id', $categoriesCbo, null, ['class' => 'form-control', 'placeholder' => '']) !!}
					</div>
				</div>

				<div class="form-group form-group-sm">
					{!! Form::label('mercado_publico_id', 'ID Mercado Publico', ['class' => 'control-label col-sm-3']) !!}
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon">
								{!! Form::checkbox('especial', true) !!}
							</span>
							{!! Form::text('mercado_publico_id', null, ['class' => 'form-control', 'disabled' => true]) !!}
						</div>
					</div>
				</div>
				<div class="form-group form-group-sm">
					{!! Form::label('price', 'Precio Unitario', ['class' => 'control-label col-sm-3']) !!}
					<div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon">$</span>
							{!! Form::text('price', null, ['class' => 'form-control']) !!}
						</div>
					</div>
				</div>
				{{--
				<div class="form-group">
					{!! Form::label('img', 'Imagen Principal', ['class' => 'control-label col-sm-3']) !!}
					<div class="col-lg-9">
						{!! Form::file('img', ['class' => 'file-styled file-input']) !!}
					</div>
				</div>
				--}}
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn border-slate text-slate-800 btn-flat"><i class="icon-plus-circle2 position-left"></i> Guardar</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>