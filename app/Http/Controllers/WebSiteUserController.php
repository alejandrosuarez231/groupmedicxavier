<?php

namespace Cpanel\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

use Cpanel\SiteUsers;
use Cpanel\User;
use Cpanel\SiteNewsletters;

use Session;

class WebSiteUserController extends Controller
{
	public function index()
	{
		Session::put('breadCrumb', 'SiteUsers');
		Session::flash('title', 'Control de usuarios registrados en el sitio web');
		return view('web.user.index', [
				'usuarios'		=> SiteUsers::all(),
				'newsletters' 	=> SiteNewsletters::leftJoin('users', 'users.email', '=', 'newsletters.email')
						            ->select('users.email as userEmail', 'newsletters.email as newsEmail')
						            ->get(),
			]);
	}

	public function destroy($id)
	{
		$user = SiteUsers::find($id);
		$user->delete();

		return response()->json('success');
	}

	public function convenio($id)
	{
		$user = SiteUsers::find($id);
		$user->verificado = ($user->verificado == 'si') ? 'no' : 'si';
		$user->save();

		return response()->json('success');
	}

	public function getBasicData($tabla)
	{
		if ($tabla == 'usuarios') {
			$users = SiteUsers::all();

			$data = Datatables::of($users)
							->editColumn('name', function($users) {
								return $users->name.' '.$users->last_name;
							})
							->editColumn('convenio', function($users) {
								if ($users->convenio == true) {
									$convenio = ($users->verificado == 'si') ? '<span class="label label-primary">Comprobado</span>' : '<span class="label label-warning">Sin Comprobar</span>';
								}else{
									$convenio = '<span class="label label-default">No requerido</span>';
								}
								return $convenio;
							})
							->editColumn('id', function($users) {

								$actions  = '<a class="btn btn-default btn-xs no-border" href="#" data-toggle="modal" data-target="#modalDetalles" ';
								$actions .= 'data-id="'.$users->id.'"';
								$actions .= 'data-name="'.$users->name.' '.$users->last_name.'"';
								$actions .= 'data-email="'.$users->email.'"';
								$actions .= 'data-rut="'.$users->rut.'"';
								$actions .= 'data-phone="'.$users->phone.'"';
								$actions .= 'data-address="'.$users->address.'"';
								$actions .= 'data-convenio="'.$users->convenio.'"';
								$actions .= 'data-verificado="'.$users->verificado.'"';
								$actions .= '><i class="icon-menu7"></i></a>';
								return $actions;
							})
							->rawColumns(['convenio', 'id'])
							->make(true);
			return $data;
		}elseif ($tabla == 'suscripciones') {
			$suscripciones = SiteNewsletters::leftJoin('users', 'users.email', '=', 'newsletters.email')
							->select('users.email as userEmail', 'newsletters.email as newsEmail')
							->get();

			$data = Datatables::of($suscripciones)
							->editColumn('userEmail', function($suscripciones) {
								return ($suscripciones->userEmail) ? '<span class="label label-primary">Cliente registrado</span>' : '<span class="label label-default">Cliente NO registrado</span>';
							})
							->rawColumns(['userEmail'])
							->make(true);
			return $data;
		}

	}
}
