<?php

namespace Cpanel\Http\Controllers;

use Illuminate\Http\Request;
use Cpanel\Marcas;
use Cpanel\SiteArticles;
use Cpanel\SiteSuppliers;
use Cpanel\SiteCategories;
use Session;

class MarcasController extends Controller
{
    public function index()
	{
		Session::put('breadCrumb', 'marcas.index');
    	Session::flash('title', 'Inventario de Marcas');
        dd(Session::put('breadCrumb', 'articulos.index'));
		return view('marcas.index', [
			'marcas' => Marcas::all(),
			'articles' => SiteArticles::all(),
            'categories' => SiteCategories::all(),
            'suppliers' => SiteSuppliers::all(),
            'categoriesCbo' => SiteCategories::orderBy('categorie')->pluck('categorie', 'id'),
            'suppliersCbo' => SiteSuppliers::orderBy('maker')->pluck('maker', 'id'),
            ]);
	}
}
