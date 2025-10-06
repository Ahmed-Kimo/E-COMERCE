<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Session\Store;


class ProductController extends Controller
{
    
    public function addProduct(Request $request){
        $categories = Category::all() ;
        return view('addproduct' , compact('categories'));
    }

    public function storeProduct(AddProduct $request){

         $data = $request->validated();
         $data['image'] = $request->image->store('images' , 'public') ;

        Product::create([
            'name' => $request->name ,
            'price' => $request->price ,
            'quantity' => $request->quantity ,
            'img' =>  $data['image'],
            'description' => $request->description , 
            'category_id' => $request->categoryid  
        ]);

        return to_route('products');
    
        
    }


     public function editProduct($productid = null){
        if ($productid) {
            # code...
        $product = Product::findOrFail($productid) ;
         $categories = Category::all() ;

        return view('edit' , compact(['categories' , 'product']));
    }
}


public function updateProduct($productid , AddProduct $request){

    $product = Product::findOrFail($productid) ;
    $imageName = $product->img ;
     
    if ($request->hasFile('image')) {
        // حذف الصورة القديمة لو موجودة
         if ($product->img && file_exists(public_path('assets/' . $product->img))) {
            unlink(public_path('assets/images/' . $product->img));
        }

        // حفظ الصورة الجديدة
        $image = $request->image;
        $imageName = 'images/' .  time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images') , $imageName);


        // حفظ اسم الصورة فقط (أو المسار لو حابب)
        
    }

        $product->update([
            'name' => $request->name ,
            'price' => $request->price ,
            'quantity' => $request->quantity ,
            'img' => $imageName ,
            'description' => $request->description , 
            'category_id' => $request->categoryid  
        ]);

        return to_route('products' , compact('product'));
    
        
    }


     public function destroyProduct($productid = null){
        if ($productid) {
            # code...
        $product = Product::findOrFail($productid) ;
        $product->delete();
        return to_route('products');
    }


}
}
