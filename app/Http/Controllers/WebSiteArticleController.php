<?php

namespace Cpanel\Http\Controllers;

use Illuminate\Http\Request;
use Cpanel\Http\Requests\ArticleStoreRequest;
use Cpanel\Http\Requests\articlesCategorieStoreRequest;
use Cpanel\Http\Requests\articlesMakerStoreRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use Yajra\Datatables\Datatables;

use Cpanel\SiteArticles;
use Cpanel\SiteArticlesPictures;
use Cpanel\SiteArticlesCaracteristics;
use Cpanel\SiteCategories;
use Cpanel\SiteSuppliers;

use Session;
use Validator;
use Auth;
use DB;

class WebSiteArticleController extends Controller
{
    public function index()
    {
        //aca abre el menu de articulos y lo envia a la vista
    	Session::put('breadCrumb', 'articulos.index');
    	Session::flash('title', 'Inventario de Artículos');
        $article = SiteCategories::all();
        //dd($article);

    	return view('web.articles.index', [
            'articles' => SiteArticles::all(),
            'categories' => SiteCategories::all(),
            'suppliers' => SiteSuppliers::all(),
            'categoriesCbo' => SiteCategories::orderBy('categorie')->pluck('categorie', 'id'),
            'suppliersCbo' => SiteSuppliers::orderBy('maker')->pluck('maker', 'id'),
            ]);
    }

    public function store(ArticleStoreRequest $request)
    {
        //return $request->all();
        $article = SiteArticles::create([
            'mercado_publico_id'    => $request->mercado_publico_id,
            'product_categorie_id'  => $request->product_categorie_id,
            'product_maker_id'      => $request->product_maker_id,
            'description'           => $request->description,
            'price'                 => $request->price,
            ]);
        return response()->json(['message' => 'Información almacenada', 'title' => 'Completado']);
    }

    public function show($id)
    {
        $article = SiteArticles::where('id', $id)->withTrashed()->first();
        
        Session::flash('title', $article->description);
        Session::put('breadCrumb', 'articlesShow');
        Session::put('breadCrumbDynamic', $article);
        
        return view('web.articles.show', [
            'article' => $article,
            'categoriesCbo' => SiteCategories::orderBy('categorie')->pluck('categorie', 'id'),
            'suppliersCbo' => SiteSuppliers::orderBy('maker')->pluck('maker', 'id'),
            ]);
    }

    public function update(ArticleStoreRequest $request, $id)
    {
        //dd($request->all());
        //return $request->all();
        $articulo = SiteArticles::where('id', $id)->withTrashed()->first();
        
        $articulo->mercado_publico_id   = $request->mercado_publico_id;
        $articulo->product_categorie_id = $request->product_categorie_id;
        $articulo->product_maker_id     = $request->product_maker_id;
        $articulo->description          = $request->description;
        $articulo->price                = $request->price;
        
        $articulo->save();

        alert()->message('Los datos del artículo han sido actualizados.', 'Guardado');
        return back();
    }

    public function articlesTable($id)
    {

        switch ($id) {
            case 1:
            $tableData = SiteArticles::orderBy('description')->withTrashed()->get();
            $data = Datatables::of($tableData)
            ->addColumn('category', function ($tableData){
               // dd($tableData->all());
                $class = (!is_null($tableData->deleted_at)) ? 'border-danger-600 text-danger-800' : 'border-info-600 text-info-800';
                $span = '<span class="label label-flat label-block '.$class.'">';
                $span .= $tableData->category->categorie;
                $span .= (!is_null($tableData->deleted_at)) ? ' &nbsp;<i class="icon-eye-blocked  pull-left"></i>' : '';
                $span .= '</span>';
                return $span;
            })
            ->addColumn('img', function ($tableData) {
                if(count($tableData->pictures)>0)
                {
                    if (collect($tableData->pictures)->where('principal', true)->first()) {
                        $img  = '<a href="http://scinformatica.cl/site/public/'.collect($tableData->pictures)->where('principal', true)->first()->route.'"  data-popup="lightbox">';
                        $img .= '<img src="http://scinformatica.cl/site/public/'.collect($tableData->pictures)->where('principal', true)->first()->route.'" class="img-rounded img-preview">';
                        $img .= '</a>';
                    }else{
                        $img  = '<a href="http://scinformatica.cl/site/public/'.collect($tableData->pictures)->first()->route.'"  data-popup="lightbox">';
                        $img .= '<img src="http://scinformatica.cl/site/public/'.collect($tableData->pictures)->first()->route.'" class="img-rounded img-preview">';
                        $img .= '</a>';
                    }
                }else{
                    $img  = '<a href="http://scinformatica.cl/img/placeholder.jpg" data-popup="lightbox">';
                    $img .= '<img src="http://scinformatica.cl/img/placeholder.jpg" class="img-rounded img-preview">';
                    $img .= '</a>';
                }
                return $img;
            })
            ->editColumn('price', function ($tableData) {
                return '$ '.number_format($tableData->price, 2, ',', '.');
            })
            ->editColumn('id', function($tableData) {
                $actions  = '<ul class="icons-list pull-right">';
                $actions .= '<li class="dropdown">';
                $actions .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
                $actions .= '<i class="icon-menu9"></i>';
                $actions .= '</a>';
                $actions .= '<ul class="dropdown-menu dropdown-menu-right">';
                $actions .= '<li><a href="'.route('articles.show', $tableData->id).'" ><i class="icon-eye"></i> Ver</a></li>';
                $actions .= '<li><a href="#" onclick="';
                $actions .= (!is_null($tableData->deleted_at)) ? 'restoreElement(\'' : 'deleteElement(\'';
                $actions .= (!is_null($tableData->deleted_at)) ? route('web.articles.restore', $tableData->id) : route('web.articles.delete', $tableData->id) ;
                $actions .= '\')"><i class="';
                $actions .= (!is_null($tableData->deleted_at)) ? 'icon-unlocked' : 'icon-lock4';
                $actions .= '"></i>';
                $actions .= (!is_null($tableData->deleted_at)) ? 'Habilitar' : 'Desabilitar';
                $actions .= '</a></li>';
                $actions .= '<li class="divider"></li>';
                $actions .= '<li><a href="#" onclick="destroyElement(\''.route('web.articles.destroy', $tableData->id).'\')"><i class="icon-bin"></i> Eliminar</a></li>';
                $actions .= '</ul>';
                $actions .= '</li>';
                $actions .= '</ul>';
                return $actions;
            })
            ->rawColumns(['category','img', 'id'])
            ->make(true);
            break;

            case 2:
            $tableData = SiteCategories::orderBy('categorie')->get();
            $data = Datatables::of($tableData)
            ->addColumn('img', function ($tableData) {
                if($tableData->img<>'')
                {
                    $img  = '<a href="http://scinformatica.cl/site/public/'.$tableData->img.'"  data-popup="lightbox">';
                    $img .= '<img src="http://scinformatica.cl/site/public/'.$tableData->img.'" class="img-rounded img-preview">';
                    $img .= '</a>';
                 }else{
                    $img  = '<a href="http://scinformatica.cl/img/placeholder.jpg" data-popup="lightbox">';
                    $img .= '<img src="http://scinformatica.cl/img/placeholder.jpg" alt="" class="img-rounded img-preview">';
                    $img .= '</a>';
                }
                return $img;
            })
            ->editColumn('id', function($tableData) {
                $actions  = '<ul class="icons-list pull-right">';
                $actions .= '<li class="dropdown">';
                $actions .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
                $actions .= '<i class="icon-menu9"></i>';
                $actions .= '</a>';
                $actions .= '<ul class="dropdown-menu dropdown-menu-right">';
                $actions .= '<li><a href="#" onclick="editCategorie('.$tableData->id.')"><i class="icon-pencil6"></i> Editar</a></li>';
                $actions .= '<li><a href="'.route('web.categorie.img.index', $tableData->id).'"><i class="icon-images3"></i> Cambiar Imagen</a></li>';
                $actions .= '<li><a href="#" onclick="deleteElement(\''.route('web.articles.categories.delete', $tableData->id).'\')"><i class="icon-bin"></i> Eliminar</a></li>';
                $actions .= '</ul>';
                $actions .= '</li>';
                $actions .= '</ul>';
                return $actions;
            })
            ->rawColumns(['img', 'id'])
            ->make(true);
            break;

            case 3:
            $tableData = SiteSuppliers::orderBy('maker')->get();
            $data = Datatables::of($tableData)
            ->addColumn('img', function ($tableData) {
                if($tableData->img<>'')
                {
                    $img  = '<a href="http://scinformatica.cl/site/public/'.$tableData->img.'"  data-popup="lightbox">';
                    $img .= '<img src="http://scinformatica.cl/site/public/'.$tableData->img.'" class="img-rounded img-preview">';
                    $img .= '</a>';
                 }else{
                    $img  = '<a href="http://scinformatica.cl/img/placeholder.jpg" data-popup="lightbox">';
                    $img .= '<img src="http://scinformatica.cl/img/placeholder.jpg" alt="" class="img-rounded img-preview">';
                    $img .= '</a>';
                }
                return $img;
            })
            ->editColumn('id', function($tableData) {
                $actions  = '<ul class="icons-list pull-right">';
                $actions .= '<li class="dropdown">';
                $actions .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">';
                $actions .= '<i class="icon-menu9"></i>';
                $actions .= '</a>';
                $actions .= '<ul class="dropdown-menu dropdown-menu-right">';
                $actions .= '<li><a href="#" onclick="editSupplier('.$tableData->id.')"><i class="icon-pencil6"></i> Editar</a></li>';
                $actions .= '<li><a href="'.route('web.supplier.img.index', $tableData->id).'"><i class="icon-images3"></i> Cambiar Imagen</a></li>';
                $actions .= '<li><a href="#" onclick="deleteElement(\''.route('web.articles.supplier.delete', $tableData->id).'\')"><i class="icon-bin"></i> Eliminar</a></li>';
                $actions .= '</ul>';
                $actions .= '</li>';
                $actions .= '</ul>';
                return $actions;
            })
            ->rawColumns(['img', 'id'])
            ->make(true);
            break;
            default:
            break;
        }


        return $data;
    }


    public function articlesDelete($id)
    {
        $article = SiteArticles::where('id', $id)->withTrashed()->first();
        $article->delete();
        return response()->json(['message' => 'Información eliminada', 'title' => 'Completado']);
    }

    public function articlesRestore($id)
    {
        $article = SiteArticles::withTrashed()->where('id', $id)->first();

        $article->restore();
        return response()->json(['message' => 'Articulo restaurado', 'title' => 'Completado']);

    }

    public function articlesDestroy($id)
    {
        $article = SiteArticles::withTrashed()->where('id', $id)->first();
        foreach ($article->pictures as $key => $picture) {
            Storage::disk('ftp')->delete($picture->route);
        }
        $article->forceDelete();
        return response()->json(['message' => 'Información eliminada', 'title' => 'Completado']);
    }

    public function articlesCategorieStore(articlesCategorieStoreRequest $request)
    {
        $categorie = SiteCategories::create([
            'categorie' => $request->categorie,
            'description' => $request->description,
            'img' => '',            
            ]);
        return response()->json(['message' => 'Información almacenada', 'title' => 'Completado']);
    }

    public function articleCategrieEdit($id)
    {
        $categorie = SiteCategories::find($id);
        return response()->json($categorie);
    }

    public function articlesCategorieUpdate(articlesCategorieStoreRequest $request, $id)
    {
        $categorie = SiteCategories::find($id);

        $categorie->categorie = $request->categorie;
        $categorie->description = $request->description;

        $categorie->save();
        
        return response()->json(['message' => 'Datos Actualizados', 'title' => 'Guardado']);
    }

    public function articleCategorieDestroy($id)
    {
        $categorie = siteCategories::find($id);
        $categorie->delete();
        
        return response()->json(['message' => 'Información eliminada', 'title' => 'Completado']);
    }

    public function articleSupplierStore(articlesMakerStoreRequest $request)
    {
        $proveedor = SiteSuppliers::create($request->all());
        return response()->json(['message' => 'Información agregada', 'title' => 'Completado']);
    }

    public function articleSupplierEdit($id)
    {
        $proveedor = SiteSuppliers::find($id);
        return response()->json($proveedor);
    }

    public function articlesSupplierUpdate(articlesMakerStoreRequest $request, $id)
    {
        $proveedor = SiteSuppliers::find($id);
        $proveedor->maker = $request->maker;
        $proveedor->save();
        return response()->json(['message' => 'Información agregada', 'title' => 'Completado']);
    }

    public function articleSupplierDestroy($id)
    {
        $supplier = SiteSuppliers::find($id);
        $supplier->delete();
        return response()->json(['message' => 'Información eliminada', 'title' => 'Completado']);
    }

    public function articlesGaleryIndex($id)
    {
        Session::put('breadCrumb', 'galery');
        Session::flash('title', 'Galeria de Imagenes');
        return view('web.articles.galery', ['article' => SiteArticles::where('id', $id)->withTrashed()->first()]);
    }

    public function articlesGaleryStore(Request $request, $id)
    {
        $article = SiteArticles::where('id', $id)->withTrashed()->first();        
        
        $files = $request->file('file');

        foreach($files as $file){
            $fileName = $file->getClientOriginalName();
            $extension = collect(explode(".",  $fileName))->last();

            $imgPath = Storage::disk('ftp')->putFileAs(
                    'img/ProductsImages', $file, md5(date('d-m-Y h:i:s')).'.'.$extension 
                );

            $article->pictures()->create([
            'route' => $imgPath,
            'principal' => 0,
            ]);
        alert()->message('Los datos del artículo han sido actualizados.', 'Guardado');
        }

         
        return response()->json('success');
    }

    public function articlesGaleryChangePrimary($id)
    {
        $picture = SiteArticlesPictures::find($id);

        $article = SiteArticles::where('id', $picture->product_id)->withTrashed()->first();
        dd($article->all());
        $article->pictures()->update(['principal' => false]);

        $picture->principal = true;
        $picture->save();

        return back();
    }

    public function articlesGaleryDestroy($id)
    {
        $picture = SiteArticlesPictures::find($id);
        if (Storage::disk('ftp')->exists($picture->route)) {
            Storage::disk('ftp')->delete($picture->route);
        }
        $picture->delete();
        return back();
    }

    public function articlesCategorieImgIndex($id)
    {
        Session::put('breadCrumb', 'categorieImg');
        Session::flash('title', 'Imagen para Categoria');
        return view('web.articles.imgCategorie', ['categorie' => siteCategories::find($id)]);
    }

    public function articlesCategorieImgStore(Request $request, $id)
    {
        $file = $request->file('img');
        $fileName = $file->getClientOriginalName();
        $extension = collect(explode(".",  $fileName))->last();

        $categorie = siteCategories::find($id);
        
        $imgPath = Storage::disk('ftp')->putFileAs(
            'img/ProductsImages', $request->file('img'), md5(date('d-m-Y h:i:s')).'.'.$extension 
            );

        $categorie->img = $imgPath;
        $categorie->save();
        return back();
    }

    public function articlesCategorieImgDestroy($id)
    {
        $picture = siteCategories::find($id);
        if (Storage::disk('ftp')->exists($picture->img)) {
            Storage::disk('ftp')->delete($picture->img);
        }
        $picture->img = null;
        $picture->save();

        return back();
    }

    public function articlesSupplierImgIndex($id)
    {
        Session::put('breadCrumb', 'supplierImg');
        Session::flash('title', 'Imagen para Proveedor');
        return view('web.articles.imgSupplier', ['supplier' => SiteSuppliers::find($id)]);
    }

    public function articlesSupplierImgStore(Request $request, $id)
    {
        $file = $request->file('img');
        $fileName = $file->getClientOriginalName();
        $extension = collect(explode(".",  $fileName))->last();

        $supplier = SiteSuppliers::find($id);
        
        $imgPath = Storage::disk('ftp')->putFileAs(
            'img/ProductsImages', $request->file('img'), $supplier->maker.'.'.$extension 
            );

        $supplier->img = $imgPath;
        $supplier->save();
        return back();
    }

    public function articlesSupplierImgDestroy($id)
    {
        $picture = SiteSuppliers::find($id);
        
        if (Storage::disk('ftp')->exists($picture->img)) {
            Storage::disk('ftp')->delete($picture->img);
        }

        $picture->img = null;
        $picture->save();

        return back();
    }


    public function articlesCaracteristicsIndex($id)
    {
        Session::put('breadCrumb', 'caracteristics');
        Session::flash('title', 'Caracteristicas del Producto');
        return view('web.articles.caracteristics', ['article' => SiteArticles::where('id', $id)->withTrashed()->first()]);
    }

    public function articlesCaracteristicsStore(Request $request, $id)
    {
        $article = SiteArticles::where('id', $id)->withTrashed()->first();
        $article->caracteristics()->firstOrCreate([
            'feature'           => $request->feature,
            'feature_details'   => $request->feature_details,
            ]);
        return back();
    }

    public function articlesCaracteristicsDestroy($id)
    {
        $caracteristic = SiteArticlesCaracteristics::find($id);
        $caracteristic->delete();
        return back();
    }
}
