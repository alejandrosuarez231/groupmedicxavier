<div id="mdSupplierPlus" class="modal fade in">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-teal-600">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h5 class="modal-title"><i class="icon-plus-circle2"></i> &nbsp;Agregar Nuevos Proveedores</h5>
			</div>

			{!! Form::open(['route' => 'web.articles.supplier.store', 'class' => 'form-horizontal', 'id' => 'frmSupplier']) !!}
			<div class="modal-body">
				<div class="form-group form-group-sm">
					{!! Form::label('maker', 'Proveedor', ['class' => 'control-label col-sm-3']) !!}
					<div class="col-sm-9">
						{!! Form::text('maker', null, ['class' => 'form-control input-roundles']) !!}
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