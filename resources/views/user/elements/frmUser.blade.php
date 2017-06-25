<div class="form-group form-group-sm has-feedback has-feedback-left">
	{!! Form::label('name', '', ['class' => 'sr-only']) !!}
	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombres']) !!}
	<div class="form-control-feedback">
		<i class="icon-person"></i>
	</div>
</div>

<div class="form-group form-group-sm has-feedback has-feedback-left">
	{!! Form::label('email', '', ['class' => 'sr-only']) !!}
	{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
	<div class="form-control-feedback">
		<i class="icon-mention"></i>
	</div>
</div>

<div class="form-group form-group-sm has-feedback has-feedback-left">
	{!! Form::label('description', '', ['class' => 'sr-only']) !!}
	{!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Descripción de cargo']) !!}
	<div class="form-control-feedback">
		<i class="icon-office"></i>
	</div>
</div>