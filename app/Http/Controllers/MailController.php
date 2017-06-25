<?php

namespace sci\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Mail;

use sci\Mail\AutomaticRequest;


class MailController extends Controller
{
    public function contact(Request $request)
    {
    	Mail::to($request->email, $request->firstname.' '.$request->lastname)
    				->send(new AutomaticRequest($request->firstname.' '.$request->lastname));

    	alert()->basic('Hemnos recibido tu información', 'Completado');
    	return back();
    }
}
