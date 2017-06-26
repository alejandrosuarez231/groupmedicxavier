<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\HorarioRequest;

use App\Medico;

class MedicoHorarioController extends Controller
{
	public function store(Request $request)
	{
		
	}

	public function show($id)
	{
		$medico = Medico::find($id);
		return view('medico.horario.show', ['medico' => $medico]);
	}

	public function update(Request $request, $id)
	{
		//dd($request->all());
		$medico = Medico::find($id);
		
		$hora_ini = date("H:i:s", strtotime($request->hora_ini));
		$hora_fin = date("H:i:s", strtotime($request->hora_fin));
		$cant_pac =$request->cant_pac;

		if ($cant_pac<1){
			alert()->warning('La Cantidad de <strong>Pacientes</strong> debe ser mayor a 0 , corrija esto.', 'Verificar')->html()->persistent('Aceptar');
			return back()->withInput();
		}

		if ($hora_ini >= $hora_fin) {
			alert()->warning('La hora de <strong>inicio de atención</strong> no puede ser mayor o igual a la <strong>hora de fin de atención</strong>, corrija esto.', 'Verificar')->html()->persistent('Aceptar');
			return back()->withInput();
		}

		if(date ("H", strtotime($request->hora_ini)) <12) {
			$turno = "mañana";
		}
		else if (date ("H", strtotime($request->hora_ini)) < 18){
			$turno = "tarde";
		}
		else {
			$turno = "noche";
		}

		$medico->horario()->firstOrCreate([
				'dia' 		=> $request->dia,
				'turno' 	=> $turno,
				'hora_ini' 	=> $request->hora_ini,
				'hora_fin' 	=> $request->hora_fin,
				'cant_pac'	=> $request->cant_pac,
			]);

		alert()->success('Horario guardado.', '¡Guardado!')->html()->persistent('Aceptar');
		return back();
	}
}
