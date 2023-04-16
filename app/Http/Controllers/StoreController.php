<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function index()
    {
        return view('Stores.stores-list', [
     
            'Stores' =>Store::all()

        ]);
    }

    public function create()
    {

        return view('Stores.create-store', [


            'categories'=>Category::all()->sortBy("name")

        ]);

    }

    public function store(Request $request)

    {

        $request->validate([

            'price'=>['required', 'min:3', 'max:255'],
            'category'=>['required']

        ]);

Store::add($request->all());

return redirect()->route('card.index');


    }

    public function edit( $storeId)
    {

        return view('Stores.edit-store', [


            'categories'=>Category::all()->sortBy("name"),
            'store'=>Store::find($storeId)
        ]);
    }
    public function update(Request $request, $storeId)
    {
        $request->validate([

            'price'=>'required | min:3| max:255',
            'category'=>'required'

        ]);

        $store = Store::find($storeId);
        $store->update([

           'price'=>$request->input('price'),
           'group'=>$request->input('group'),
           'info'=>$request->input('info'),
           'category_id'=>$request->input('category'),
        ]);
        return redirect()->route("card.index");
    }

    public function delete($storeId)
    {

        Store::find($storeId)->delete();
        return back();


    }

    public function show($storeSlug)

    {

        return view("Stores.show-store", [

          'store'=>Store::where("slug", $storeSlug)->first()

        ]);

    }
}
