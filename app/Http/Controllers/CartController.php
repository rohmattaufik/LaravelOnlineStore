<?php namespace App\Http\Controllers;

use App\Cart;
use App\product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;

class CartController extends Controller {

	public function getAddToCart(Request $request, $id){
		$product = product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->add($product, $product->id);

		$request->session()->put('cart',$cart);
		return redirect('products');
	}

	public function getCart(){
		if(!Session::has('cart')){
			return view('test.cart')->with('products', null);
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		return view('test.cart')->with(['products'=>$cart->items, 'totalPrice'=>$cart->totalPrice]);
	}

}
