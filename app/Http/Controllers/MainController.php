<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Store;
use App\Models\Group;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function ap_store(Request $request)
    {
      $stores = Store::all();
       

       if(isset($_GET['search'])){
        $stores = Store::where("info", 'like', "%".$_GET['search']."%")->GET();
        }

    
       return view("main",[
        'stores' => $stores,
       ]);
       
    }
   

    public function card()
    {
        
     
            $stores = Store::paginate(8);

       

            return view('main', [
              'stores'=>$stores,
              'categories'=>Category::all()->sortBy('name'),
              'groups'=>Group::all()->sortBy('name') 
              ] );
    }

  public function changeLocale(Request $request, $lang)
  {

    $request->session()->put('lang',$request -> lang);
      return back();

  }

  public function showStore($storeSlug)
  {
      return view('store-page',[
         'store' => Store::where('slug', $storeSlug)->first() 
      ]);
  }

}

