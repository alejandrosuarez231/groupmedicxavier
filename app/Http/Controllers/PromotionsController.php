<?php

namespace sci\Http\Controllers;

use Illuminate\Http\Request;

use sci\Promotions;

class PromotionsController extends Controller
{
    public function index()
    {
    	return view('promotions.index', ['promotions' => Promotions::all()]);
    }
}
