<?php namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Item;
use App\product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OrderController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($idUser)
	{
		$orders = User::find($idUser)->orders;
		if (!$orders) {
			abort(404);
		}
		// $items = null;
		// foreach ($orders as $order) {
		//     $product = product::find($order->id);
		// 		$storedItem = ['qty' => $order->quantity, 'item' => $product];
		// 		$items[$order->id] = $storedItem;
		// }
		return view('test.order')->with('orders',$orders);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::find($id);
		if (!$order) {
			abort(404);
		}
		$items = Order::find($id)->items;
		return view('test.viewOrder')->with(['order'=>$order,'items'=>$items]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
