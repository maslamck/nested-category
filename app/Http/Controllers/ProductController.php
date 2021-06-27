<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        $categories = Category::get();
        return view('products.index')->with(['products' => $products, 'categories' => $categories]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'name'=>'required',
            'category_id'=>'required'

        ]);
        Product::create($data);
        return redirect()->back()->with('success', 'Product created');
        
    }

    public function show(Product $product)
    {
        dd('hi');
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
    public function getProducts($categories)
    {
        $category_path = $categories;
        $categories = explode('/', $categories);
        $categorySlug = array_pop($categories);
        $categorySlug = str_replace('-', ' ', $categorySlug);
        $categories22 = Category::where('name', $categorySlug)
            ->with('childrenCategories', 'parent')
            ->get();
            $parent_cat = [];
            foreach($categories22 as $category){
                if( $category->childrenCategories ){
                    foreach($category->childrenCategories as $level2){
                        array_push($parent_cat, $level2->id);
                    }
                }
                array_push($parent_cat, $category->id);
            }
        $category_id = Category:: where('name', $categorySlug)->first();
        $products = Product::whereIn('category_id', $parent_cat)->get(); 
        return view('products', compact('products', 'category_path'));

    }
}
