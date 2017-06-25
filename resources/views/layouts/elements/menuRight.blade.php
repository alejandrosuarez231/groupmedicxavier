<div class="sidebar sidebar-opposite sidebar-default">
	<div class="sidebar-content">
		<div class="tabbable sortable ui-sortable">

			<ul class="nav nav-lg nav-tabs nav-justified">
				<li class="active">
					<a href="#config" data-toggle="tab" aria-expanded="false">
						<i class="fa fa-cogs fa-lg"></i>
						<span class="visible-xs-inline-block position-right">Configuración</span>
					</a>
				</li>
				<li class="">
					<a href="#users" data-toggle="tab" aria-expanded="false">
						<i class="fa fa-users fa-lg"></i>
						<span class="visible-xs-inline-block position-right">Usuarios</span>
					</a>
				</li>

				<li class="">
					<a href="#users" data-toggle="tab" aria-expanded="false">
						<i class="fa fa-tachometer fa-lg"></i>
						<span class="visible-xs-inline-block position-right">Visualización</span>
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane no-padding active" id="config">

				</div>
				<div class="tab-pane no-padding" id="users">
					<div class="sidebar-category">
						<div class="category-title">
							<span>Crear Usuario</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						{!! Form::open(['class' => 'category-content']) !!}
							<div class="form-group form-group-sm has-feedback">
								<input type="text" class="form-control input-lg" placeholder="Right icon, input large">
								<div class="form-control-feedback">
									<i class="icon-make-group"></i>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6">
									<button type="button" class="btn btn-xs border-slate text-slate-800 btn-block btn-flat">Reset</button>
								</div>
								<div class="col-xs-6">
									<button type="submit" class="btn btn-xs border-info text-info btn-block no-border-radius">Submit</button>
								</div>
							</div>
						{!! Form::close() !!}
					</div>
					<div class="sidebar-category">
						<div class="category-title">
							<span>Action dropdown</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content">
							<ul class="media-list">
								<li class="media">
									<div class="media-left">
										<a href="#">
											<img src="assets/images/placeholder.jpg" class="img-xs img-circle" alt="">
											<span class="badge badge-info media-badge">6</span>
										</a>
									</div>

									<div class="media-body media-middle">
										Rebecca Jameson
									</div>

									<div class="media-right media-middle">
										<ul class="icons-list text-nowrap">
											<li class="">
												<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
													<li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
													<li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
													<li class="divider"></li>
													<li><a href="#"><i class="icon-statistics pull-right"></i> Statistics</a></li>
												</ul>
											</li>
										</ul>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="#">
											<img src="assets/images/placeholder.jpg" class="img-xs img-circle" alt="">
											<span class="badge badge-info media-badge">9</span>
										</a>
									</div>

									<div class="media-body media-middle">
										Walter Sommers
									</div>

									<div class="media-right media-middle">
										<ul class="icons-list text-nowrap">
											<li>
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-more2"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
													<li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
													<li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
													<li class="divider"></li>
													<li><a href="#"><i class="icon-statistics pull-right"></i> Statistics</a></li>
												</ul>
											</li>
										</ul>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="#"><img src="assets/images/placeholder.jpg" class="img-xs img-circle" alt=""></a>
									</div>

									<div class="media-body media-middle">
										Otto Gerwald
									</div>

									<div class="media-right media-middle">
										<ul class="icons-list text-nowrap">
											<li>
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-more2"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
													<li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
													<li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
													<li class="divider"></li>
													<li><a href="#"><i class="icon-statistics pull-right"></i> Statistics</a></li>
												</ul>
											</li>
										</ul>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="#"><img src="assets/images/placeholder.jpg" class="img-xs img-circle" alt=""></a>
									</div>

									<div class="media-body media-middle">
										Vince Satmann
									</div>

									<div class="media-right media-middle">
										<ul class="icons-list text-nowrap">
											<li>
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-more2"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
													<li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
													<li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
													<li class="divider"></li>
													<li><a href="#"><i class="icon-statistics pull-right"></i> Statistics</a></li>
												</ul>
											</li>
										</ul>
									</div>
								</li>

								<li class="media">
									<div class="media-left">
										<a href="#"><img src="assets/images/placeholder.jpg" class="img-xs img-circle" alt=""></a>
									</div>

									<div class="media-body media-middle">
										Jason Leroy
									</div>

									<div class="media-right media-middle">
										<ul class="icons-list text-nowrap">
											<li>
												<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-more2"></i></a>
												<ul class="dropdown-menu dropdown-menu-right">
													<li><a href="#"><i class="icon-comment-discussion pull-right"></i> Start chat</a></li>
													<li><a href="#"><i class="icon-phone2 pull-right"></i> Make a call</a></li>
													<li><a href="#"><i class="icon-mail5 pull-right"></i> Send mail</a></li>
													<li class="divider"></li>
													<li><a href="#"><i class="icon-statistics pull-right"></i> Statistics</a></li>
												</ul>
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>