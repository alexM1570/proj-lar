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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
            
        ]);
     

        
        $group =  Group::create($request->all());
        $group->categories()->attach($request->input("categories"));
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
