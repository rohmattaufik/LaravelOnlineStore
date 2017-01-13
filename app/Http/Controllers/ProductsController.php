<?php namespace App\Http\Controllers;

use App\product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProductsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = product::all();
		return view('test.index')->with('products',$products);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('test.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$product = product::where('slug',$slug)->first();
		if (!$product) {
			abort(404);
		}
		return view('test.show')->with('product',$product);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
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
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
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
	 * Remove the specified resource from storage.
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
