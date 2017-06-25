<?php

namespace Cpanel\Http\Controllers;

use Illuminate\Http\Request;

use Cpanel\Cliente;

use Session;

class VentasClientesController extends Controller
{
    public function index()
    {
    	Session::put('breadCrumb', 'clientes');
        Session::flash('title', 'Cartera de Clientes');
    	return view('ventas.clientes.index', [
    			'clientes' => [],
    		]);
    }

    public function store(Request $request)
    {
    	return $request->all();

    	$cliente = Cliente::create([
    			'nombre' => $request->nombre,
				'rut' => $request->rut,
				'giro' => $request->giro,
				'direccion' => $request->direccion,
				'tel' => $request->tel,
				'email' => $request->email,
     		]);
    }
}
