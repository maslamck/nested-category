<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::whereNull('category_id')
            ->with('childrenCategories', 'parent')
            ->get();
        $parent_cat = [];
        foreach($categories as $category){
            if( $category->childrenCategories ){
                foreach($category->childrenCategories as $level2){
                    array_push($parent_cat, [$level2->id, $level2->name]);
                }
            }
            array_push($parent_cat, [$category->id, $category->name]);
        }
        
        return view('categories')->with(['categories' => $categories, 'parent_cat' => $parent_cat]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $data = $this->validate($request,[
            'name'=>'required',
            'category_id'=>'nullable'
         ],
        [
            'name.required' => 'The category name field is required'
        ]
    );
        
        Category::create($data);
        return redirect()->back()->with('success', 'Category created');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function products($categories)
    {
        dd($categories);
    }
   

}
