<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Item;
use App\Brand;
use App\Category;

class CategoryController extends Controller {

    public function index() {
        $items = Item::all();
        $i = []; 
        foreach ($items as $item) {

            $item->brand_name = Brand::find($item->brand_id)->brand;
            $i[] = $item;}
        $categories = Category::all();
        return view('items_categories', [
	        	'items' => $i,
                'categories' => $categories 
                ]);}

    public function getItemsInCategoryId($category_name) {
        $category = Category::where('category', '=', $category_name)->first();
        $category_id = $category->id;
        $items = Item::where('category_id','=', $category_id)->get();
        $categories = Category::all();        
        return view('items_category', [
            'items' => $items,
            'categories' => $categories             
        ]);}

}
