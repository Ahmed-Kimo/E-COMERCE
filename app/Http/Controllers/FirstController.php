<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class FirstController extends Controller
{
    
    public function getAllCategories() {
    $categories = Category::all();
    return view('index' , compact('categories'));
    }

    public function getProducts($cateid = null) {
        if (!$cateid) {
             $products = Product::all();
              return view('products' , compact('products'));
        }else{
            $products = Product::where('category_id' , $cateid)->get();
            return view('products' , compact('products'));
        }
    }


    public function getCatePro() {
        $products = Product::all();
        $categories = Category::all();
        
            return view('category' , compact('products' , 'categories'));

    }

}
