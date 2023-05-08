<?php

namespace App\Http\Controllers;
use App\Http\Controllers\attach;
use App\Models\Category;
use App\Models\Group;
use App\Models\Store;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('groups.index',[
        'groups'=>Group::all()->sortBy('name')    
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create',[
            
            'stores' => Store::all()->sortBy('name'),
            'groups'=>Group::all()->sortBy('name') ,
            'categories'=>Category::all()->sortBy('name')
        ]);
        
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
            
        ]);
     

        
        $group =  Group::create($request->all());
        $group->categories()->attach($request->input("categories"));
        return redirect()->route('groups.index');
    }
    public function show()
    {
//
    }

        public function edit(Group $group)
    {
       return view('groups.edit',[
        
        'group'=>$group,
        'categories'=>Category::all()->sortBy('name'),
        
       ]); 
    }
    public function update(Request $request, Group $group)
    {
         
$request->validate([
       'name'=>'required',

       ]);
        $group->update($request->all());
        $group->categories()->sync($request->input("categories"));
        return redirect()->route('groups.index');
    }
  
    public function destroy(Group $group)
    {
      $group->delete();
      return back();
    }
}
