<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use App\Models\Store;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    public function index()
    {
        return view('Stores.stores-list', [
     
            'Stores' =>Store::all(),
            'categories'=>Category::all()->sortBy("name"),
            'groups'=>Group::all()->sortBy('name')            
        ]);
    }

    public function create()
    {

        return view('Stores.create-store', [


            'categories'=>Category::all()->sortBy("name"),
            'groups'=>Group::all()->sortBy('name')

        ]);

    }

    public function store(Request $request)

    {

        $request->validate([

            'price'=>['required', 'min:3', 'max:255'],
            'category'=>['required']

        ]);

   $store = Store::add($request->all());

   $store->uploadImage($request->file("image"));
   $store->groups()->attach($request->input("groups"));
   return redirect()->route('card.index');

$groups = Group::create($request->all());
$groups->srores()->attach($request->input('groups'));
return back( );




    }

    public function edit( $storeId)
    {

        return view('Stores.edit-store', [

            'groups'=>Group::all()->sortBy('name'),  
            'categories'=>Category::all()->sortBy("name"),
            'store'=>Store::find($storeId)
        ]);
    }
    public function update(Request $request, Store $store,$storeId)
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
          
        ]);
        $store->uploadImage($request->file("image"));
        

        $store->update($request->all());
        $store->groups()->attach($request->input('groups'));
        return redirect()->route("card.index")->with('success', 'Данные успешно обновлены!');
    }

    public function delete($storeId)
    {
        Store::find($storeId)->remove();
        return back();


    }

    public function show($storeSlug)

    {

        return view("Stores.show-store", [

          'store'=>Store::where("slug", $storeSlug)->first()

        ]);

    }

    public function removeImage($storeId)
    {
Store::find($storeId)->removeImage();
return back();

    }
}
