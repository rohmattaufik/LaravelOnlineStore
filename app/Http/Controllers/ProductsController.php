<?php namespace App\Http\Controllers;

use App\product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductsController extends Controller {

	/**
	 * Show list of products
	 *
	 * @return list of products
	 */
	public function index()
	{
		$products = product::all();
		return view('test.index')->with('products',$products);
	}


	/**
	 * Display the specified product.
	 *
	 * @param  int  $slug
	 * @return product
	 */
	public function show($slug)
	{
		$product = product::where('slug',$slug)->first();
		if (!$product) {
			abort(404);
		}
		return view('test.show')->with('product',$product);
	}


//-----------------------------------------------------------------

	/**
	 * Show the form for creating a new product.
	 *
	 * @return form
	 */
	public function create()
	{
		return view('test.create');
	}

	/**
	 * Store a newly created product in storage.
	 *
	 * @return redirect -> list of product
	 */
	public function store(Request $request)
	{
		$this -> validate($request, [
			'title' => 'required',
			'kategory' => 'required',
			'desc' => 'required',
			'stock' => 'required',
			'price' => 'required',
			'image' => 'required',
		]);

		$product = new product;
		$product->title = $request->title;
		$product->kategory = $request->kategory;
		$product->desc = $request->desc;
		$product->stock = $request->stock;
		$product->price = $request->price;
		$product->image = $request->image;
		$product->slug = str_slug($request->title,'-');
		$product->save();

		return redirect('products');
	}


	/**
	 * Show the form for editing the specified product.
	 *
	 * @param  int  $id of product
	 * @return form edit
	 */
	public function edit($id)
	{
		$product = product::find($id);
		if (!$product) {
			abort(404);
		}
		return view('test.edit')->with('product',$product);
	}

	/**
	 * Update the specified product in storage.
	 *
	 * @param  int  $id
	 * @return redirect-> list of product
	 */
	public function update(Request $request, $id)
	{
		$this -> validate($request, [
			'title' => 'required',
			'kategory' => 'required',
			'desc' => 'required',
			'stock' => 'required',
			'price' => 'required',
			'image' => 'required',
		]);

		$product = product::find($id);
		$product->title = $request->title;
		$product->kategory = $request->kategory;
		$product->desc = $request->desc;
		$product->stock = $request->stock;
		$product->price = $request->price;
		$product->image = $request->image;
		$product->slug = str_slug($request->title,'-');
		$product->save();

		return redirect('products');
	}

	/**
	 * Remove the specified product from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = product::find($id);
		$product->delete();
		return redirect('products');
	}

}
