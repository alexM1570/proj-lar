<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function ap_store()
    {
    
       // dd(auth()->user());
    
       return view("main");
       
    }
   

    public function card()
    {
        
     
            $stores = Store::all();

            return view('main', ['stores'=>$stores] );
    }

  public function changeLocale(Request $request, $lang)
  {

    $request->session()->put('lang',$request -> lang);
   // echo $request->session()->get('lang');
    return back();

  }

}

