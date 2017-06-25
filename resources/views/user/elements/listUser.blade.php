<table class="table" id="users-table">
	<thead>
		<tr>
			<th width="20%">Nombres</th>
			<th width="20%">Cargo</th>
			<th>Email</th>
			<th width="15%"></th>
		</tr>
	</thead>
	<tbody>
	{{--
		@foreach (collect($users)->sortBy('name') as $user)
		<tr>
			<td>{{ $user->name }}</td>
			<td>{{ $user->description }}</td>
			<td>{{ $user->email }}</td>
			<td>
				<ul class="list list-inline no-margin">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle text-default" data-toggle="dropdown" aria-expanded="false">
							Acciones
							<span class="caret"></span>
						</a>

						<ul class="dropdown-menu dropdown-menu-right no-border-radius">
							<li><a href="{{ route('user.edit', $user->id) }}"><i class="icon-pencil7"></i>Editar</a></li>
							<li><a href="#"><i class="icon-bin"></i>Eliminar</a></li>
						</ul>
					</li>
				</ul>
			</td>
		</tr>
		@endforeach
	--}}
	</tbody>
</table>
