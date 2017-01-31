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
	 * function index
	 * -> Display list of order made by active customer
	 *   -> get user id, find all order
	 * @return Response
	 */
	public function index($idUser)
	{
		// find user id
		/**
			* code
			* (*not complete)
		*/

		// find all customer order
		$orders = User::find($idUser)->orders;
		// abort if not found
		if (!$orders) {
			abort(404);
		}

		return view('test.order')->with('orders',$orders);
	}

	/**
	 * function show(id)
	 * -> Display the specified order.
	 * 		-> order (order id( order number ), user, time, ispayd )
	 *		-> order hasMany item
	 *		-> item = detail of product (product's name, price, quantity)
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// find order
		$order = Order::find($id);
		//validate order
		if (!$order) {
			abort(404);
		}
		// find the all item of the order
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
