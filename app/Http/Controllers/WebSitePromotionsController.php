<?php

namespace Cpanel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Cpanel\Promotions;
use Cpanel\SiteCategories;
use Cpanel\SiteArticles;
use Cpanel\SitePromotions;
use Cpanel\SiteBanner;

use Session;

class WebSitePromotionsController extends Controller
{
	public function index()
	{
		Session::put('breadCrumb', 'promotions');
		Session::flash('title', 'Promociones');
		
		return view('web.promotions.index', [
			'promotions'	=> SitePromotions::all(),
			]);
	}

	public function create()
	{
		Session::put('breadCrumb', 'promotionsCreate');
		Session::flash('title', 'Agregar una Promoción');
		return view('web.promotions.create', ['categoriesCbo' => SiteCategories::orderBy('categorie')->pluck('categorie', 'id')]);
	}

	public function store(Request $request)
	{

		$promocion = SitePromotions::create($request->except('emphasis'));

		if ($request->emphasis) {
			$promotions = SiteBanner::create([
				'position'				=> collect(SiteBanner::all())->last()->position + 1,
				'title' 				=> $promocion->title,
				'title_animation' 		=> 'slideInDown',
				'description' 			=> $promocion->summary,
				'description_animation' => 'slideInLeft',
				'img_animation' 		=> 'slideInRight',
				'promotion_id' 			=> $promocion->id,
				]);
		}

		return redirect()->route('promociones.index');
	}

	public function edit($id)
	{
		$promocion = SitePromotions::find($id);
		if ($promocion) {
			Session::put('breadCrumb', 'promotionsEdit');
			Session::put('breadCrumbDynamic', $promocion);

			Session::flash('title', 'Editar una promoción');
			return view('web.promotions.edit', [
				'promocion' => SitePromotions::find($id),
				'categoriesCbo' => SiteCategories::orderBy('categorie')->pluck('categorie', 'id')
				]);
		}
		return back();
	}

	public function update(Request $request, $id)
	{
		$promocion = SitePromotions::find($id);
		$promocion->fill($request->except('emphasis'));
		$promocion->save();

		if ($request->emphasis) {

			$promotions = SiteBanner::create([
				'position'				=> collect(SiteBanner::all())->last()->position + 1,
				'title' 				=> $promocion->title,
				'title_animation' 		=> 'slideInDown',
				'description' 			=> $promocion->summary,
				'description_animation' => 'slideInLeft',
				'img_animation' 		=> 'slideInRight',
				'promotion_id' 			=> $promocion->id,
				]);
		}

		return back();

	}

	public function destroy($id)
	{
		$promocion = SitePromotions::withTrashed()
									->where('id', $id)
									->first();
		$banner = $promocion->banner()->withTrashed()->first(); 									
		$promocion->forceDelete();
		if ($banner) {
			$banner->forceDelete();
		}
		return response()->json('success');
	}

	public function delete($id)
	{
		$promocion = SitePromotions::withTrashed()
									->where('id', $id)
									->first();

		$banner = $promocion->banner;
		if ($banner) {
			$banner->delete();
		}
		$promocion->delete();
		return back();	
	}

	public function restore($id)
	{
		$promocion = SitePromotions::withTrashed()
		->where('id', $id)
		->first();
		$banner = $promocion->banner()->withTrashed()->first(); 
		$promocion->restore();
		if ($banner) {
			$banner->restore();
		}
		return back();	
	}

	public function allData()
	{
		$promociones = SitePromotions::withTrashed()->get();
		return response()->json($promociones);
	}

	public function promotionsItems($id)
	{
		return response()->json(SiteArticles::orderBy('description')->where('product_categorie_id', $id)->select('description', 'id')->get());
	}

	public function promotionsCategory($id)
	{
		switch ($id) {
			case 'categorias':
			break;
			case 'articulos':
			break;
			case 'servicios':
			break;
			case 'otras':
			break;
			default:
			break;
		}
		return response()->json();
	}
}
