<div class="panel-heading">
	<h5 class="panel-title">Cargar una nueva Promoción</h5>
	<a class="heading-elements-toggle"><i class="icon-menu"></i></a>
</div>

<div class="panel-body">
	<div class="form-group form-group-sm has-feedback has-feedback-left">
		{!! Form::label('title', '', ['class' => 'sr-only']) !!}
		{!! Form::text('title', null, ['class' => 'form-control input-lg', 'placeholder' => 'Titulo']) !!}
		<div class="form-control-feedback">
			<i class="icon-make-group"></i>
		</div>
	</div>

	<div class="form-group form-group-sm has-feedback has-feedback-left">
		{!! Form::label('description', '', ['class' => 'sr-only']) !!}
		{!! Form::textArea('description', null, ['class' => 'form-control maxlength input-lg', 'maxlength' => '225', 'placeholder' => 'Descripción de la Promoción', 'rows' => 4, 'cols' => 50]) !!}
		<div class="form-control-feedback">
			<i class="icon-make-group"></i>
		</div>
	</div>

	<div class="form-group">
		{!! Form::label('validity', 'Periodo de Validez', ['class' => '']) !!}
		<div class="input-group">
			<span class="input-group-addon"><i class="icon-calendar22"></i></span>
			{!! Form::text('validity', null, ['class' => 'form-control daterange', 'placeholder' => 'Periodo de Validez']) !!}
		</div>
	</div>

	<div class="form-group form-group-sm has-feedback has-feedback-left">
		{!! Form::label('type', '', ['class' => 'sr-only']) !!}
		{!! Form::select('type', ['categorias' => 'Categorias', 'articulos'	=> 'Articulos', 'servicios' => 'Servicios', 'otras'=> 'Otras'], null, ['class' => 'form-control input-lg', 'placeholder' => 'Tipo de Promoción', 'rows' => 4, 'cols' => 50]) !!}
		<div class="form-control-feedback">
			<i class="icon-make-group"></i>
		</div>
	</div>

	<div class="form-group form-group-sm has-feedback has-feedback-left hidden" id="category-div">
		{!! Form::label('product_categorie_id', '', ['class' => 'sr-only']) !!}
		{!! Form::select('product_categorie_id', $categoriesCbo, null, ['class' => 'form-control input-lg', 'placeholder' => 'Categoria', 'disabled' => true]) !!}
		<div class="form-control-feedback">
			<i class="icon-make-group"></i>
		</div>
	</div>

	<div class="form-group form-group-sm has-feedback has-feedback-left hidden" id="item-div">
		{!! Form::label('product_id', '', ['class' => 'sr-only']) !!}
		{!! Form::select('product_id', [], null, ['class' => 'form-control input-lg', 'placeholder' => 'Artículo', 'disabled' => true]) !!}
		<div class="form-control-feedback">
			<i class="icon-make-group"></i>
		</div>
	</div>
	<hr class="mb-5">

	<div class="form-group">
		{!! Form::label('emphasis', '', ['class' => 'sr-only']) !!}
		<div class="checkbox">
			<label>
				{!! Form::checkbox('emphasis', true, null, ['class' => 'styled']) !!} Enfasis
			</label>
		</div>
	</div>

	<div class="form-group form-group-sm has-feedback has-feedback-left hidden" id="summary-div">
		{!! Form::label('summary', 'Resumen', ['class' => 'sr-only']) !!}
		{!! Form::text('summary', null, ['class' => 'form-control input-lg', 'placeholder' => 'Resumen', 'disabled' => true]) !!}
		<div class="form-control-feedback">
			<i class="icon-make-group"></i>
		</div>
	</div>

</div>