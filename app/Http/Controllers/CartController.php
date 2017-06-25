<?php

namespace sci\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Mail;

use sci\Mail\OrderQuote;

use sci\Cart;
use sci\ProductCategory;
use sci\Products;
use sci\User;

use Auth;

class CartController extends Controller
{

	public function show($id)
	{
		return view('users.cart');
	}

	public function destroy($id)
	{
		$article = Cart::find($id);
		$article->delete();

		alert()->basic('Articulo eliminado', 'Eliminado')->persistent('aceptar');
		return back();
	}

    public function cartAdd(Request $request, $id)
    {
        if (Auth::user()) {
            $product = Products::find($id);
        	Cart::create([
        			'product_id' => ($product->id) ?? null,
        			'user_id' => Auth::user()->id,
        			'requeriments' => ($request->requeriments) ?? $product->description,
        			'quantity' => ($request->quantity) ?? 1,
                    'processed' => false
        		]);

            $mensaje = ($product) ? 'Se agrego el articulo "'.$product->description.'" a la lista para cotizar' : 'Articulo agregado a su lista';
        	alert()->basic($mensaje, 'Agregado')->persistent('aceptar');
    		return back();
        }
        alert()->error('Debe estar logueado o registrarse en el sitio para poder cotizar nuestros productos', 'Error')->persistent('aceptar');
        return back();
    }

    public function cartQuote($id)
    {
        Mail::to(Auth::user()->email, Auth::user()->name.' '.Auth::user()->last_name)
                    ->send(new OrderQuote(Auth::user()->name.' '.Auth::user()->last_name));

        Cart::where('user_id', Auth::user()->id)->delete();
        
        alert()->basic('Hemnos recibido tu información.', 'Completado');
        return back();
    }
}
