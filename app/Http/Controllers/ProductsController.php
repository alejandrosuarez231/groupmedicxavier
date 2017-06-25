<?php

namespace sci\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Mail;

use sci\Mail\serviceAdviceSupport;
use sci\Mail\OrderMail;

use sci\Http\Requests\serviceAdviceSupportRequest;

use sci\ProductCategory;
use sci\Products;

use Auth;

class ProductsController extends Controller
{
	public function index()
	{
        $productListMenu = ProductCategory::all();
		return view('products.index', ['ProductListMenu' => $productListMenu]);
	}
	
    public function show($id)
    {
        $productListMenu = ProductCategory::all();
    	$product = ProductCategory::find($id);
    	return view('products.show', [
    			'product' => $product,
                'ProductListMenu' => $productListMenu
    		]);
    }

    public function productList($id)
    {
        $products = ProductCategory::find($id);
        return view('products.lists', ['products' => $products,]);
    }

    public function productDetails($id)
    {
        return view('products.details', ['product' => Products::find($id)]);
    }

    public function convenioIndex()
    {
        return view('products.convenio');
    }

    public function serviceAdviceSupport(serviceAdviceSupportRequest $request, $service)
    {
        switch ($service) {
            case 'asesorias':
                Mail::to($request->email, $request->name)->send(new serviceAdviceSupport($request->name, $request));
                break;
            case 'red':
                Mail::to($request->email, $request->name)->send(new serviceAdviceSupport($request->name, $request));
                break;
            case 'soporte':
                Mail::to($request->email, $request->name)->send(new serviceAdviceSupport($request->name, $request));
                break;
            default:
                break;
        }
        Mail::to('info@scinformatica.cl', 'Soporte Web')->send(new OrderMail($request, $service));
        alert()->basic('Su solicitud ha sido recibida, espere nuestra respuesta.', 'Enviado')->autoclose(3500);
        return back();
    }
}
