<?php namespace App\Http\Controllers;

use App\product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductsController extends Controller {


//------------------------Customer area----------------------------------------

	/**
	 * function index()
	 * -> Show list of products (all product from database)
	 * @return list of products
	 */
	public function index()
	{
		$products = product::all();
		return view('test.index')->with('products',$products);
	}


	/**
	 * function show($slug)
	 * -> Display the specified produc
	 *  	-> get product by it slug
	 *		-> product's slug is product's title but 'space' replace by '-'
	 * @param  int  $slug
	 * @return product
	 */
	public function show($slug)
	{
		// find the product by it's slug
		$product = product::where('slug',$slug)->first();
		// abort if product not found
		if (!$product) {
			abort(404);
		}
		return view('test.show')->with('product',$product);
	}


//-----------------------Admin area------------------------------------------

	/**
	 * function create()
	 * -> Show the form for creating a new product.
	 * @return form
	 */
	public function create()
	{
		return view('test.create');
	}

	/**
	 * function store
	 * -> Store a newly created product in storage.
	 * -> get data from form, validate, store to database
	 * @return redirect -> list of product
	 */
	public function store(Request $request)
	{
		// validate the form
		$this -> validate($request, [
			'title' => 'required',
			'kategory' => 'required',
			'desc' => 'required',
			'stock' => 'required',
			'price' => 'required',
			'image' => 'required',
		]);
		//store to database
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
	 * function edit
	 * -> Show the form for editing the specified product.
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
	 * function update()
	 * Update the specified product in storage.
	 * -> get product info, validate, update
	 * @param  int  $id product
	 * @return redirect-> list of product
	 */
	public function update(Request $request, $id)
	{
		// validate the form
		$this -> validate($request, [
			'title' => 'required',
			'kategory' => 'required',
			'desc' => 'required',
			'stock' => 'required',
			'price' => 'required',
			'image' => 'required',
		]);
		//find the product and update
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
/**	public function destroy($id)
	{
		$product = product::find($id);
		$product->delete();
		return redirect('products');
	}
	*/
}
