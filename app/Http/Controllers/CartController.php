<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Store;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Store $store)
    {
       $currentUser = auth()->user();

       $args=[];
       if($currentUser){
        $args['user_id'] = $currentUser->id;

       }

       $cart = $currentUser->cart;

       if(! $cart){
 
        $cart = Cart::create($args);
       }

     

       CartItem::create([
         'cart_id' => $cart->id,
         'store_id' => $store->id,
         'price' => $store->price,
         'sub_total' => $store->price
       ]); 

      return response()->json([
        'qty' => $cart->items->count(),
        'success' => 'Товар' . $store->info . 'добавлен в корзину.',
      ]);

      
    }

    public function cartPage()
    {

      
return view('cart',[
  'cart' => auth()->user()->cart
]);
    }

    public function changeQty(Request $request, CartItem $item)
    {

      $item->update(['quantity' =>$request->input('quantity')]);
      return back();
      
    }

    public function destroy(CartItem $item)
    {

      $item->delete();
      return back();
    }
}
