<?php

namespace App\Http\Controllers;
use App\Models\Group;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoriesList(){


        $categories = Category::all();
        return view('categories.categories-list', [

            "categories" => $categories

        ]);

    }

    public function createCategory()
    {

        return view('categories.create-category', [

            'categories'=>Category::all()->sortBy('name'),
            'groups'=>Group::all()->sortBy('name') 
        ]);


        

    }

    public function storeCategory(Request $request)

    {

$category = Category::create($request->all());
return redirect()->route('categories.droad');



    }

    public function editCategory($categoryId)
    {

$category = Category::find($categoryId);

return view('categories.edit-category', [
    'category' => $category
]);

    }

    public function updateCategory(Request $request, $categoryId)
    {

      $category = Category::find($categoryId);
      $category ->update($request->all());
      return redirect()->route("categories.droad");

    }

    public function deleteCategory($categoryId)
    {

        $category = Category::find($categoryId);
        $category->delete();

        return back();

    }

}
