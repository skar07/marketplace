<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    //The add to cart functionality
    public function add(Product $product){

	\Cart::session(auth() -> id()) -> add(
		array(
		'id' => $product -> id,
		'name' => $product -> name,
		'description' => $product -> description,
		'quantity' => 1,
		'price' => $product -> price,
		'attributes' => array(),
    		'associatedModel' => $product
	));
	return redirect() -> route('cart.index');
    }
    public function index(){

	    $cartItems = \Cart::session(auth() -> id()) -> getContent();
	    return view('cart.index') -> with('cartItems', $cartItems);
    }

    public function destroy($itemId){

   	    \Cart::session(auth() -> id()) -> remove($itemId);
	    return back();
    }
    public function update($itemId){

	    \Cart::session(auth() -> id()) -> update($itemId, [
	    		'quantity' => array(
				'relative' => false,
				'value' => 'itemId -> id'
			    ),
	    ]);
	    return back();
    }
    public function checkout(){
	    return view('cart.checkout');
    }
}
