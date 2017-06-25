<?php

namespace Cpanel\Http\Controllers;

use Illuminate\Http\Request;
use Cpanel\Http\Requests\UserSaveRequest;
use Yajra\Datatables\Datatables;

use Cpanel\User;

use Auth;
use Session;

class UserController extends Controller
{
	public function index()
	{
        Session::put('breadCrumb', 'users');
        Session::flash('title', 'Administración de Usuarios');

        return view('user.index', ['users' => User::all()]);
    }

    public function create()
    {
        Session::put('breadCrumb', 'usersCreate');
        Session::flash('title', 'Crear nuevo usuario');
        return view('user.create');
    }

    public function store(UserSaveRequest $request)
    {
        User::create($request->all());
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);

        Session::put('breadCrumb', 'usersEdit');
        Session::put('breadCrumbDynamic', $user);

        Session::flash('title', 'Editar información del usuario');
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->description = $request->description;
        $user->email = $request->email;
        if (isset($request->img)) {
            $user->img = $request->img;
        }
        if (isset($request->password)) {
            $user->password = $request->password;
        }

        $user->save();
        return back();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return response()->json(['message' => 'Información eliminada', 'title' => 'Completado']);
    }

    public function passwordReset($id)
    {
        $user = User::find($id);
        $user->password = 'SCinformatica2017';
        $user->save();

        return response()->json();
    }

    public function getBasicData()
    {
        $users = User::all();

        return Datatables::of($users)
                            ->editColumn('id', function($users) {
                                $options  = '<ul class="list list-inline no-margin">';
                                $options .= '<li class="dropdown">';
                                $options .= '<a href="#" class="dropdown-toggle text-default" data-toggle="dropdown" aria-expanded="false">';
                                $options .= 'Acciones';
                                $options .= '<span class="caret"></span>';
                                $options .= '</a>';
                                $options .= '';
                                $options .= '<ul class="dropdown-menu dropdown-menu-right no-border-radius">';
                                $options .= '<li><a href="'.route('user.edit', $users->id).'"><i class="icon-pencil7"></i>Editar</a></li>';
                                $options .= '<li><a href="'.route('user.password.reset', $users->id).'"><i class="icon-rotate-cw3"></i>Reiniciar Password</a></li>';
                                $options .= '<li class="divider"></li>';
                                $options .= '<li><a href="#" onclick="deleteUser('.$users->id.')"><i class="icon-bin"></i>Eliminar</a></li>';
                                $options .= '</ul>';
                                $options .= '</li>';
                                $options .= '</ul>';

                                return $options;
                            })
                            ->rawColumns(['id'])
                            ->make(true);
    }
    
    public function myProfile()
    {
    	Session::put('breadCrumb', 'profile');
    	Session::flash('title', 'Mi Perfil');
    	return view('user.profile');
    }
}
