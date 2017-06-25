@extends('layouts.app')

@section('content')
<div class="col-md-4 col-md-offset-4">
	{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT', 'id' => 'userForm']) !!}
	<div class="panel panel-white no-border-radius border-top-lg border-top-teal-400">
		<div class="panel-heading">
			<h5 class="panel-title"><i class="icon-cog3 position-left"></i> Crear nuevo Usuario</h5>
		</div>

		<div class="panel-body">
			@include('user.elements.frmUser')

		</div>

		<div class="panel-footer text-right pt-5 pb-5">
			<button type="submit" class="btn btn-xs btn-flat text-primary btn-primary">
				Actualizar información <i class="icon-arrow-right14 position-right"></i>
			</button>
		</div>
	</div>
	{!! Form::close() !!}
</div>
@endsection

@push('js')
{!! Html::script('vendor/jsvalidation/js/jsvalidation.js') !!}
{!! JsValidator::formRequest('Cpanel\Http\Requests\UserSaveRequest', '#userForm') !!}
@endpush